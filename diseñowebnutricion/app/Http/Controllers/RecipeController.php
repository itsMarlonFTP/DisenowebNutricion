<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Verifica si el usuario actual es administrador
     */
    private function isAdmin()
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }

    /**
     * Muestra la lista de recetas
     */
    public function leer()
    {
        $recipes = Recipe::paginate(10);
        
        // Asignar imágenes predeterminadas si no tienen imagen
        foreach ($recipes as $recipe) {
            if (!$recipe->image_url) {
                switch (strtolower($recipe->recipename)) {
                    case 'ensalada césar':
                        $recipe->image_url = '/images/recipes/default/ensalada-cesar.jpg';
                        break;
                    case 'batido de proteinas':
                        $recipe->image_url = '/images/recipes/default/batido-proteinas.jpg';
                        break;
                    case 'omelette de espinacas':
                        $recipe->image_url = '/images/recipes/default/omelette-espinacas.jpg';
                        break;
                    case 'salmón al horno':
                        $recipe->image_url = '/images/recipes/default/salmon-horno.jpg';
                        break;
                    case 'yogur de frutas':
                        $recipe->image_url = '/images/recipes/default/yogur-frutas.jpg';
                        break;
                    default:
                        $recipe->image_url = '/images/recipes/default/default.jpg';
                        break;
                }
            }
        }
        
        return view('recipes.leer', compact('recipes'));
    }

    /**
     * Muestra el formulario para crear una nueva receta
     */
    public function crear()
    {
        if (!$this->isAdmin()) {
            return redirect()->back()->with('error', 'No tienes permisos de administrador.');
        }
        return view('recipes.crear');
    }

    /**
     * Guarda una nueva receta
     */
    public function guardarNueva(Request $request)
    {
        if (!$this->isAdmin()) {
            return redirect()->back()->with('error', 'No tienes permisos de administrador.');
        }

        $request->validate([
            'recipename' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'calories' => 'required|numeric',
            'protein' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fats' => 'required|numeric',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            \Log::info('Iniciando creación de nueva receta');
            
            $recipe = new Recipe();
            $recipe->fill($request->except('image'));
            $recipe->userID = auth()->id();

            if ($request->hasFile('image')) {
                \Log::info('Procesando imagen para la nueva receta');
                
                $file = $request->file('image');
                if (!$file->isValid()) {
                    throw new \Exception('El archivo de imagen no es válido');
                }

                // Asegurar que el directorio existe
                $path = public_path('images/recipes');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                // Generar nombre único para la imagen
                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                
                // Mover la imagen al directorio public
                $file->move($path, $imageName);
                
                // Verificar que el archivo se guardó correctamente
                if (!file_exists($path . '/' . $imageName)) {
                    throw new \Exception('Error al guardar la imagen');
                }

                $recipe->image_url = '/images/recipes/' . $imageName;
                \Log::info('Imagen guardada exitosamente: ' . $recipe->image_url);
            }

            $recipe->save();
            \Log::info('Receta guardada exitosamente');

            return redirect()->route('recipes.leer')
                ->with('success', '¡Receta creada exitosamente!');

        } catch (\Exception $e) {
            \Log::error('Error al crear receta: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al crear la receta: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Muestra los detalles de una receta
     */
    public function ver($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.ver', compact('recipe'));
    }

    /**
     * Muestra el formulario para editar una receta
     */
    public function actualizar($id)
    {
        if (!$this->isAdmin()) {
            return redirect()->back()->with('error', 'No tienes permisos de administrador.');
        }
        $recipe = Recipe::findOrFail($id);
        return view('recipes.actualizar', compact('recipe'));
    }

    /**
     * Actualiza una receta existente
     */
    public function guardar(Request $request, $id)
    {
        if (!$this->isAdmin()) {
            return redirect()->back()->with('error', 'No tienes permisos de administrador.');
        }

        $request->validate([
            'recipename' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'calories' => 'required|numeric',
            'protein' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fats' => 'required|numeric',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            \Log::info('Iniciando actualización de receta ID: ' . $id);
            
            $recipe = Recipe::findOrFail($id);
            $recipe->fill($request->except('image'));

            if ($request->hasFile('image')) {
                \Log::info('Procesando nueva imagen para la receta');
                
                $file = $request->file('image');
                if (!$file->isValid()) {
                    throw new \Exception('El archivo de imagen no es válido');
                }

                // Eliminar imagen anterior si existe
                if ($recipe->image_url) {
                    $oldPath = public_path(str_replace('/images', 'images', $recipe->image_url));
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                        \Log::info('Imagen anterior eliminada: ' . $oldPath);
                    }
                }

                // Asegurar que el directorio existe
                $path = public_path('images/recipes');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                    \Log::info('Directorio creado: ' . $path);
                }

                // Generar nombre único para la imagen
                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                \Log::info('Nombre de imagen generado: ' . $imageName);
                
                // Mover la imagen al directorio public
                $file->move($path, $imageName);
                \Log::info('Imagen movida a: ' . $path . '/' . $imageName);
                
                // Verificar que el archivo se guardó correctamente
                if (!file_exists($path . '/' . $imageName)) {
                    throw new \Exception('Error al guardar la imagen');
                }

                $recipe->image_url = '/images/recipes/' . $imageName;
                \Log::info('URL de imagen actualizada: ' . $recipe->image_url);
            }

            $recipe->save();
            \Log::info('Receta actualizada exitosamente');

            return redirect()->route('recipes.leer')
                ->with('success', '¡Receta actualizada exitosamente!');

        } catch (\Exception $e) {
            \Log::error('Error al actualizar receta: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Error al actualizar la receta: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Elimina una receta
     */
    public function eliminar($id)
    {
        if (!$this->isAdmin()) {
            return redirect()->back()->with('error', 'No tienes permisos de administrador.');
        }

        $recipe = Recipe::findOrFail($id);
        
        // Eliminar la imagen si existe
        if ($recipe->image_url) {
            $path = public_path(str_replace('/images', 'images', $recipe->image_url));
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        $recipe->delete();

        return redirect()->route('recipes.leer')
            ->with('success', '¡Receta eliminada exitosamente!');
    }
}
