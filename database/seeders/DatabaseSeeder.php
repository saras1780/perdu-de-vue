<?php

namespace Database\Seeders;

use App\Enums\Color;
use App\Enums\PlaceKind;
use App\Models\Item;
use App\Models\Place;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 4 lieux
        $hall = Place::create(['name' => 'Hall des guichets', 'kind' => PlaceKind::Hall]);
        $quai1 = Place::create(['name' => 'Quai 1 (Voie A)', 'kind' => PlaceKind::Platform]);
        $quai2 = Place::create(['name' => 'Quai 2 (Voie B)', 'kind' => PlaceKind::Platform]);
        $train = Place::create(['name' => 'Train P vers Namur', 'kind' => PlaceKind::Train]);

        // 8 étiquettes
        $tags = [
            'fragile' => Tag::create(['name' => 'Fragile']),
            'vivant' => Tag::create(['name' => 'Vivant']),
            'odeur' => Tag::create(['name' => 'Odeur']),
            'lourd' => Tag::create(['name' => 'Lourd']),
            'vetement' => Tag::create(['name' => 'Vêtement']),
            'precieux' => Tag::create(['name' => 'Précieux']),
            'bizarre' => Tag::create(['name' => 'Bizarre']),
            'electronique' => Tag::create(['name' => 'Électronique']),
        ];

        // 15 objets (dont 3 restitués)

        // Objet 1 (Restitué)
        $item1 = Item::create([
            'place_id' => $quai1->id, 'name' => 'Nain de jardin (Gérard)', 'description' => 'Un grand nain de jardin souriant avec un bonnet rouge.', 'color' => Color::Red, 'found_on' => '2026-10-02', 'returned_at' => '2026-10-05'
        ]);
        $item1->tags()->sync([$tags['lourd']->id, $tags['bizarre']->id]);

        // Objet 2
        $item2 = Item::create([
            'place_id' => $train->id, 'name' => 'Poisson rouge dans un sachet', 'description' => 'Sachet d\'eau de fête foraine. Le poisson semble aller bien.', 'color' => Color::Orange, 'found_on' => '2026-10-10'
        ]);
        $item2->tags()->sync([$tags['vivant']->id, $tags['fragile']->id]);

        // Objet 3
        $item3 = Item::create([
            'place_id' => $quai2->id, 'name' => 'Une seule chaussure pointure 44', 'description' => 'Baskets de sport très usées. Forte odeur.', 'color' => Color::White, 'found_on' => '2026-10-12'
        ]);
        $item3->tags()->sync([$tags['vetement']->id, $tags['odeur']->id]);

        // Objet 4 (Restitué)
        $item4 = Item::create([
            'place_id' => $hall->id, 'name' => 'Parapluie à motifs de canards', 'description' => 'Grand parapluie avec un manche en bois.', 'color' => Color::Yellow, 'found_on' => '2026-10-01', 'returned_at' => '2026-10-02'
        ]);

        // Objet 5
        $item5 = Item::create([
            'place_id' => $hall->id, 'name' => 'Dentier dans un verre', 'description' => 'Trouvé sur un banc près des distributeurs.', 'color' => Color::White, 'found_on' => '2026-10-15'
        ]);
        $item5->tags()->sync([$tags['bizarre']->id, $tags['fragile']->id]);

        // Objet 6
        $item6 = Item::create([
            'place_id' => $quai1->id, 'name' => 'Valise pleine de briques', 'description' => 'Extrêmement lourd. Raison de son abandon inconnue.', 'color' => Color::Brown, 'found_on' => '2026-10-14'
        ]);
        $item6->tags()->sync([$tags['lourd']->id, $tags['bizarre']->id]);

        // Objet 7 (Restitué)
        $item7 = Item::create([
            'place_id' => $train->id, 'name' => 'Trompette dans son étui', 'description' => 'Étui noir, trompette en laiton avec des initiales gravées.', 'color' => Color::Yellow, 'found_on' => '2026-10-05', 'returned_at' => '2026-10-08'
        ]);
        $item7->tags()->sync([$tags['precieux']->id, $tags['fragile']->id]);

        // Objet 8
        $item8 = Item::create([
            'place_id' => $train->id, 'name' => 'Ordinateur portable des années 90', 'description' => 'Épaisseur de 10 cm, tourne encore sous Windows 95.', 'color' => Color::Grey, 'found_on' => '2026-10-18'
        ]);
        $item8->tags()->sync([$tags['electronique']->id, $tags['lourd']->id]);

        // Objet 9
        $item9 = Item::create([
            'place_id' => $hall->id, 'name' => 'Perroquet en cage', 'description' => 'Répète "Contrôle des billets" en boucle.', 'color' => Color::Green, 'found_on' => '2026-10-19'
        ]);
        $item9->tags()->sync([$tags['vivant']->id]);

        // Objet 10
        $item10 = Item::create([
            'place_id' => $quai2->id, 'name' => 'Doudou licorne', 'description' => 'Un peu sale, très doux.', 'color' => Color::Pink, 'found_on' => '2026-10-16'
        ]);

        // Objet 11
        $item11 = Item::create([
            'place_id' => $train->id, 'name' => 'Pull de Noël', 'description' => 'Motifs de rennes qui clignotent.', 'color' => Color::Red, 'found_on' => '2026-10-20'
        ]);
        $item11->tags()->sync([$tags['vetement']->id, $tags['electronique']->id]);

        // Objet 12
        $item12 = Item::create([
            'place_id' => $hall->id, 'name' => 'Tapis de bain', 'description' => 'Encore humide.', 'color' => Color::Blue, 'found_on' => '2026-10-17'
        ]);
        $item12->tags()->sync([$tags['odeur']->id, $tags['bizarre']->id]);

        // Objet 13
        $item13 = Item::create([
            'place_id' => $quai1->id, 'name' => 'Bocal de cornichons', 'description' => 'À moitié vide.', 'color' => Color::Green, 'found_on' => '2026-10-11'
        ]);
        $item13->tags()->sync([$tags['fragile']->id]);

        // Objet 14
        $item14 = Item::create([
            'place_id' => $train->id, 'name' => 'Épée en plastique', 'description' => 'Fait du bruit quand on l\'agite.', 'color' => Color::Multicolor, 'found_on' => '2026-10-13'
        ]);

        // Objet 15
        $item15 = Item::create([
            'place_id' => $hall->id, 'name' => 'Cahier de recettes secrètes', 'description' => 'Cadenassé.', 'color' => Color::Black, 'found_on' => '2026-10-09'
        ]);
        $item15->tags()->sync([$tags['precieux']->id]);
    }
}
