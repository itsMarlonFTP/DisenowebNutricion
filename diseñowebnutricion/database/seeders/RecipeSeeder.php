<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            [
                'recipename' => 'Ensalada César con Pollo',
                'descripcion' => 'Una clásica ensalada César con pollo a la parrilla, crutones y aderezo cremoso.',
                'ingredients' => "Lechuga romana\nPechuga de pollo\nCrutones\nQueso parmesano\nAderezo César\nLimón\nAceite de oliva",
                'instructions' => "1. Lavar y cortar la lechuga\n2. Cocinar el pollo a la parrilla\n3. Preparar el aderezo\n4. Mezclar todos los ingredientes\n5. Espolvorear queso parmesano",
                'calories' => 350,
                'protein' => 30,
                'carbs' => 15,
                'fats' => 20,
                'category' => 'Almuerzo',
                'userID' => 1
            ],
            [
                'recipename' => 'Batido de Proteínas',
                'descripcion' => 'Un batido energético perfecto para después del entrenamiento.',
                'ingredients' => "1 plátano\n1 taza de leche de almendras\n1 scoop de proteína en polvo\n1 cucharada de mantequilla de maní\nHielo",
                'instructions' => "1. Pelar y cortar el plátano\n2. Agregar todos los ingredientes a la licuadora\n3. Licuar hasta obtener una mezcla suave\n4. Servir inmediatamente",
                'calories' => 280,
                'protein' => 25,
                'carbs' => 30,
                'fats' => 8,
                'category' => 'Snack',
                'userID' => 1
            ],
            [
                'recipename' => 'Omelette de Espinacas',
                'descripcion' => 'Un desayuno saludable y rico en proteínas.',
                'ingredients' => "3 huevos\n1 taza de espinacas\n1/4 taza de queso feta\n1 cucharada de aceite de oliva\nSal y pimienta al gusto",
                'instructions' => "1. Batir los huevos\n2. Saltear las espinacas\n3. Cocinar el omelette\n4. Agregar el queso feta\n5. Doblar y servir",
                'calories' => 320,
                'protein' => 22,
                'carbs' => 5,
                'fats' => 24,
                'category' => 'Desayuno',
                'userID' => 1
            ],
            [
                'recipename' => 'Salmón al Horno con Verduras',
                'descripcion' => 'Una cena saludable y deliciosa rica en omega-3.',
                'ingredients' => "2 filetes de salmón\n1 taza de brócoli\n1 taza de zanahorias\n2 cucharadas de aceite de oliva\nLimón\nHierbas al gusto",
                'instructions' => "1. Precalentar el horno\n2. Preparar las verduras\n3. Sazonar el salmón\n4. Hornear por 20 minutos\n5. Servir caliente",
                'calories' => 450,
                'protein' => 35,
                'carbs' => 20,
                'fats' => 25,
                'category' => 'Cena',
                'userID' => 1
            ],
            [
                'recipename' => 'Yogur con Frutas y Granola',
                'descripcion' => 'Un postre saludable y refrescante.',
                'ingredients' => "1 taza de yogur griego\n1/2 taza de frutas mixtas\n1/4 taza de granola\n1 cucharada de miel\nCanela al gusto",
                'instructions' => "1. Colocar el yogur en un tazón\n2. Agregar las frutas\n3. Espolvorear la granola\n4. Agregar miel y canela\n5. Servir frío",
                'calories' => 280,
                'protein' => 15,
                'carbs' => 35,
                'fats' => 10,
                'category' => 'Postre',
                'userID' => 1
            ]
        ];

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }
}
