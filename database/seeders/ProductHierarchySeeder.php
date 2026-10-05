<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;
use App\Models\Product;

class ProductHierarchySeeder extends Seeder
{
    /**
     * Seed Categories, Subcategories, and rich Products with Size & optional Color.
     */
    public function run(): void
    {
        // 1. Bathroom Accessories
        $catBathroom = ProductCategory::where('slug', 'bathroom-accessories')->first();
        if ($catBathroom) {
            $subTowel = ProductSubcategory::updateOrCreate(
                ['slug' => 'towel-rails-racks', 'category_id' => $catBathroom->id],
                [
                    'name' => 'Towel Rails & Racks',
                    'description' => 'Heavy duty single, double and folding towel racks in AISI 304 stainless steel.',
                    'image' => 'assets/images/product/3.webp',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            $subSoap = ProductSubcategory::updateOrCreate(
                ['slug' => 'soap-dispensers-holders', 'category_id' => $catBathroom->id],
                [
                    'name' => 'Soap Dispensers & Holders',
                    'description' => 'Wall-mounted and countertop designer soap dishes, liquid dispensers and tumbler holders.',
                    'image' => 'assets/images/product/3.webp',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );

            $subHooks = ProductSubcategory::updateOrCreate(
                ['slug' => 'robe-hooks-rings', 'category_id' => $catBathroom->id],
                [
                    'name' => 'Robe Hooks & Napkin Rings',
                    'description' => 'Precision-milled brass and stainless steel bathroom robe hooks and rings.',
                    'image' => 'assets/images/product/3.webp',
                    'sort_order' => 3,
                    'status' => true,
                ]
            );

            // Products for Towel Rails
            Product::updateOrCreate(
                ['slug' => 'royal-double-towel-rail-600mm'],
                [
                    'category_id' => $catBathroom->id,
                    'subcategory_id' => $subTowel->id,
                    'name' => 'Royal Double Towel Rail',
                    'short_description' => 'Solid SS 304 dual bar towel rail with concealed mounting base.',
                    'description' => 'Engineered with premium AISI 304 solid stainless steel. Moisture-proof electro-plated finish, designed for heavy bath towels.',
                    'image' => 'assets/images/product/3.webp',
                    'size' => '24 Inch (600mm)',
                    'color' => 'Chrome Mirror',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'pvd-matte-black-folding-towel-rack'],
                [
                    'category_id' => $catBathroom->id,
                    'subcategory_id' => $subTowel->id,
                    'name' => 'Aura Folding Towel Rack with Lower Hooks',
                    'short_description' => 'Heavy gauge multi-layer folding rack with 4 robe hooks.',
                    'description' => 'Space saving 90-degree folding towel rack crafted for luxury master bathrooms. Titanium PVD coating resists scratches and tarnishing.',
                    'image' => 'assets/images/product/3.webp',
                    'size' => '600mm x 240mm',
                    'color' => 'Matte Black',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );

            // Products for Soap Dispensers (with color options)
            Product::updateOrCreate(
                ['slug' => 'luxe-wall-mount-brass-soap-dispenser-gold'],
                [
                    'category_id' => $catBathroom->id,
                    'subcategory_id' => $subSoap->id,
                    'name' => 'Luxe Wall Mount Soap Dispenser',
                    'short_description' => 'Solid brass pump head with frosted glass lotion container.',
                    'description' => 'Smooth-action brass pump mechanism with heavy chrome/gold body. Refillable 250ml luxury glass tumbler.',
                    'image' => 'assets/images/product/3.webp',
                    'size' => '250 ml',
                    'color' => 'PVD Rose Gold',
                    'sort_order' => 3,
                    'status' => true,
                ]
            );

            // Product with no color (Standard Stainless Steel)
            Product::updateOrCreate(
                ['slug' => 'ss304-magnetic-soap-holder'],
                [
                    'category_id' => $catBathroom->id,
                    'subcategory_id' => $subSoap->id,
                    'name' => 'Minimalist Magnetic Soap Holder',
                    'short_description' => 'Dry-suspension magnetic soap dish for clean and drip-free sinks.',
                    'description' => 'Hygienic suspension design keeps soap dry and long lasting. Built entirely with grade 304 steel.',
                    'image' => 'assets/images/product/3.webp',
                    'size' => 'Compact Standard',
                    'color' => null, // No color
                    'sort_order' => 4,
                    'status' => true,
                ]
            );
        }

        // 2. Ceramic Bathroom Accessories
        $catCeramic = ProductCategory::where('slug', 'ceramic-bathroom-accessories')->first();
        if ($catCeramic) {
            $subSets = ProductSubcategory::updateOrCreate(
                ['slug' => 'ceramic-vanity-sets', 'category_id' => $catCeramic->id],
                [
                    'name' => 'Ceramic Vanity Sets',
                    'description' => '4-piece and 3-piece complete porcelain countertop vanity sets.',
                    'image' => 'assets/images/product/5.webp',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            $subDispensers = ProductSubcategory::updateOrCreate(
                ['slug' => 'ceramic-lotion-bottles', 'category_id' => $catCeramic->id],
                [
                    'name' => 'Ceramic Lotion Bottles & Tumblers',
                    'description' => 'Individual artisanal ceramic lotion dispensers and brush tumblers.',
                    'image' => 'assets/images/product/5.webp',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'marquina-marble-pattern-4pc-ceramic-set'],
                [
                    'category_id' => $catCeramic->id,
                    'subcategory_id' => $subSets->id,
                    'name' => 'Marquina Vein 4-Piece Ceramic Vanity Set',
                    'short_description' => 'Artisanal high-fired porcelain set with metallic pump.',
                    'description' => 'Includes 1 Lotion Dispenser, 1 Toothbrush Holder, 1 Rinse Tumbler and 1 Soap Tray with subtle golden marble veining.',
                    'image' => 'assets/images/product/5.webp',
                    'size' => '4-Piece Set',
                    'color' => 'Emerald Green & Gold',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'matte-white-ceramic-lotion-bottle'],
                [
                    'category_id' => $catCeramic->id,
                    'subcategory_id' => $subDispensers->id,
                    'name' => 'Nordic Ribbed Ceramic Lotion Dispenser',
                    'short_description' => 'Textured fluted ceramic body with stainless steel pump nozzle.',
                    'description' => 'Minimalist tactile fluted texture fired at 1280°C for exceptional durability and non-porous hygiene.',
                    'image' => 'assets/images/product/5.webp',
                    'size' => '380 ml (18cm Height)',
                    'color' => 'Matte White',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'matte-black-ceramic-tumbler'],
                [
                    'category_id' => $catCeramic->id,
                    'subcategory_id' => $subDispensers->id,
                    'name' => 'Velvet Matte Black Ceramic Tumbler',
                    'short_description' => 'Weighted ceramic tumbler for toothbrushes or accessories.',
                    'description' => 'Heavy weighted non-tip base with silky soft-touch glaze.',
                    'image' => 'assets/images/product/5.webp',
                    'size' => '300 ml',
                    'color' => 'Matte Black',
                    'sort_order' => 3,
                    'status' => true,
                ]
            );
        }

        // 3. Cloth Drying Stands
        $catCloth = ProductCategory::where('slug', 'cloth-drying-stands')->first();
        if ($catCloth) {
            $subFloor = ProductSubcategory::updateOrCreate(
                ['slug' => 'floor-folding-drying-stands', 'category_id' => $catCloth->id],
                [
                    'name' => 'Floor Standing Foldable Dryers',
                    'description' => 'Multi-tier expandable butterfly wing cloth stands with wheels.',
                    'image' => 'assets/images/product/7.webp',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            $subWall = ProductSubcategory::updateOrCreate(
                ['slug' => 'wall-ceiling-dryers', 'category_id' => $catCloth->id],
                [
                    'name' => 'Wall Mounted & Ceiling Dryers',
                    'description' => 'Space saving retractable accordion wall brackets and pulley ceiling systems.',
                    'image' => 'assets/images/product/7.webp',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'ultra-deluxe-3-tier-drying-stand'],
                [
                    'category_id' => $catCloth->id,
                    'subcategory_id' => $subFloor->id,
                    'name' => 'Wellnox Jumbo 3-Tier Expandable Stand',
                    'short_description' => 'Heavy-duty tubular stainless steel frame with 6 lockable castor wheels.',
                    'description' => 'Provides 55 feet of drying space. Foldable wings allow one-side usage against walls. Holds up to 40 kg wash load.',
                    'image' => 'assets/images/product/7.webp',
                    'size' => '5.5 Ft Height x 2.5 Ft Width',
                    'color' => 'Stainless Steel & Royal Blue',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'ss304-retractable-accordion-wall-dryer'],
                [
                    'category_id' => $catCloth->id,
                    'subcategory_id' => $subWall->id,
                    'name' => 'Accordion Retractable Wall Dryer',
                    'short_description' => 'Collapsible concertina wall mounted hanger with 7 rods.',
                    'description' => 'Pulls out smoothly when drying clothes and pushes flat against the wall when not in use. 100% rust proof.',
                    'image' => 'assets/images/product/7.webp',
                    'size' => '36 Inch Length (900mm)',
                    'color' => null, // No color (pure stainless steel)
                    'sort_order' => 2,
                    'status' => true,
                ]
            );
        }

        // 4. Modular Kitchen Accessories
        $catKitchen = ProductCategory::where('slug', 'modular-kitchen-accessories')->first();
        if ($catKitchen) {
            $subBaskets = ProductSubcategory::updateOrCreate(
                ['slug' => 'pullout-wire-baskets', 'category_id' => $catKitchen->id],
                [
                    'name' => 'Pull-out Wire Baskets',
                    'description' => 'Plain, thali, cup-saucer and partition kitchen drawer baskets in AISI 304.',
                    'image' => 'assets/images/product/6.webp',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            $subPantry = ProductSubcategory::updateOrCreate(
                ['slug' => 'pantry-corner-units', 'category_id' => $catKitchen->id],
                [
                    'name' => 'Pantry & Magic Corner Units',
                    'description' => 'Full-height tall pantry units and swing-out corner carousel trays.',
                    'image' => 'assets/images/product/6.webp',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'ss304-perforated-cutlery-basket'],
                [
                    'category_id' => $catKitchen->id,
                    'subcategory_id' => $subBaskets->id,
                    'name' => 'Perforated Stainless Steel Cutlery Basket',
                    'short_description' => 'Heavy gauge side channels with adjustable interior dividers.',
                    'description' => 'Precision argon welded joints, high load capacity telescopic soft-closing rail compatibility. Mirror chrome buffing.',
                    'image' => 'assets/images/product/6.webp',
                    'size' => '17" x 20" x 4"',
                    'color' => 'Chrome Mirror',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'swing-magic-corner-unit-rh'],
                [
                    'category_id' => $catKitchen->id,
                    'subcategory_id' => $subPantry->id,
                    'name' => 'Universal Swing Magic Corner Unit',
                    'short_description' => 'Twin slider articulating trays maximizing blind corner kitchen cabinets.',
                    'description' => 'Smooth glide mechanism with anti-slip wooden base inserts and solid chrome rails.',
                    'image' => 'assets/images/product/6.webp',
                    'size' => '900mm Blind Corner',
                    'color' => null, // No color
                    'sort_order' => 2,
                    'status' => true,
                ]
            );
        }

        // 5. Dish Drainers
        $catDish = ProductCategory::where('slug', 'dish-drainers')->first();
        if ($catDish) {
            $subOverSink = ProductSubcategory::updateOrCreate(
                ['slug' => 'over-the-sink-dish-racks', 'category_id' => $catDish->id],
                [
                    'name' => 'Over-the-Sink Drying Racks',
                    'description' => 'Telescopic over-sink drying racks with direct water drip into basin.',
                    'image' => 'assets/images/product/6.webp',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            $subCounter = ProductSubcategory::updateOrCreate(
                ['slug' => 'countertop-2tier-drainers', 'category_id' => $catDish->id],
                [
                    'name' => '2-Tier Countertop Dish Drainers',
                    'description' => 'Double decker dish racks with removable bottom sloping drip tray.',
                    'image' => 'assets/images/product/6.webp',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'deluxe-2tier-stainless-steel-dish-drainer'],
                [
                    'category_id' => $catDish->id,
                    'subcategory_id' => $subCounter->id,
                    'name' => 'Deluxe 2-Tier Stainless Steel Dish Rack',
                    'short_description' => 'Heavy gauge frame with cutlery caddy and 6 glass hanging hooks.',
                    'description' => 'Accommodates up to 18 dinner plates plus 30 bowls. Removable sloped plastic drain tray with 360-degree rotating spout.',
                    'image' => 'assets/images/product/6.webp',
                    'size' => '540mm x 320mm x 380mm',
                    'color' => 'Brushed Silver & Black',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'telescopic-over-sink-drainer-basket'],
                [
                    'category_id' => $catDish->id,
                    'subcategory_id' => $subOverSink->id,
                    'name' => 'Expandable Over-Sink Drainer Basket',
                    'short_description' => 'Universal width adjustable strainer with rubberized grip handles.',
                    'description' => 'Adjusts to fit sinks from 35cm to 52cm. Keeps countertops completely dry during fruit, vegetable and plate washing.',
                    'image' => 'assets/images/product/6.webp',
                    'size' => '350mm to 520mm Expandable',
                    'color' => null, // No color
                    'sort_order' => 2,
                    'status' => true,
                ]
            );
        }

        // 6. Floor Drains & Gratings
        $catDrains = ProductCategory::where('slug', 'floor-drains-gratings')->first();
        if ($catDrains) {
            $subLinear = ProductSubcategory::updateOrCreate(
                ['slug' => 'linear-shower-channels', 'category_id' => $catDrains->id],
                [
                    'name' => 'Linear Shower Channels',
                    'description' => 'Architectural long shower drainers with central/side outlet and laser patterns.',
                    'image' => 'assets/images/product/1.webp',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            $subPoint = ProductSubcategory::updateOrCreate(
                ['slug' => 'square-point-floor-drains', 'category_id' => $catDrains->id],
                [
                    'name' => 'Square Point Floor Drains',
                    'description' => 'Square drainers with integrated anti-cockroach mechanical traps and hair catchers.',
                    'image' => 'assets/images/product/1.webp',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );

            $subTile = ProductSubcategory::updateOrCreate(
                ['slug' => 'tile-insert-invisible-drains', 'category_id' => $catDrains->id],
                [
                    'name' => 'Tile Insert Invisible Drains',
                    'description' => 'Reversible 2-in-1 tray drainers allowing seamless floor tile insertion.',
                    'image' => 'assets/images/product/1.webp',
                    'sort_order' => 3,
                    'status' => true,
                ]
            );

            // Products
            Product::updateOrCreate(
                ['slug' => 'wellnox-palo-linear-shower-channel'],
                [
                    'category_id' => $catDrains->id,
                    'subcategory_id' => $subLinear->id,
                    'name' => 'Palo Linear Shower Channel Drainer',
                    'short_description' => 'Square perforated laser motif with 60L/min certified discharge rate.',
                    'description' => 'Manufactured with certified AISI 304 stainless steel. Folded inner safety edges for 100% barefoot safety. Includes anti-pest barrier and debris strainer.',
                    'image' => 'assets/images/popular-product/2.webp',
                    'size' => '600mm / 750mm / 900mm',
                    'color' => 'PVD Titanium Gold',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'wellnox-wave-designer-channel-drainer'],
                [
                    'category_id' => $catDrains->id,
                    'subcategory_id' => $subLinear->id,
                    'name' => 'Wave Designer Shower Channel Drainer',
                    'short_description' => 'Fluid s-curve laser cut pattern for contemporary wet room showers.',
                    'description' => 'Deep drawn sloped channel tray directs every drop of water smoothly to the drain outlet. Scratch proof finish.',
                    'image' => 'assets/images/popular-product/4.webp',
                    'size' => '900mm x 100mm',
                    'color' => 'PVD Rose Gold',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'wellnox-square-point-drainer-trap'],
                [
                    'category_id' => $catDrains->id,
                    'subcategory_id' => $subPoint->id,
                    'name' => 'Square Point Drainer with Odour Trap',
                    'short_description' => 'Heavy gauge square grating with automatic anti-cockroach flap.',
                    'description' => 'Classic square floor drain with laser-cut concentric water slots. Mirror finish with removable hair lock basket.',
                    'image' => 'assets/images/popular-product/1.webp',
                    'size' => '150mm x 150mm (6" x 6")',
                    'color' => 'Mirror Glossy',
                    'sort_order' => 3,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'tile-insert-seamless-floor-drainer'],
                [
                    'category_id' => $catDrains->id,
                    'subcategory_id' => $subTile->id,
                    'name' => 'Seamless Tile Insert Drainer',
                    'short_description' => 'Reversible tray drainer concealing drainage completely under matching floor tile.',
                    'description' => 'Flip tray over to insert any tile or marble up to 12mm thickness, creating a sophisticated border drainage gap.',
                    'image' => 'assets/images/popular-product/1.webp',
                    'size' => '130mm x 130mm (5" x 5")',
                    'color' => null, // No color (Tile is inserted)
                    'sort_order' => 4,
                    'status' => true,
                ]
            );
        }

        // 7. MS Ladders
        $catLadders = ProductCategory::where('slug', 'ms-ladders')->first();
        if ($catLadders) {
            $subHousehold = ProductSubcategory::updateOrCreate(
                ['slug' => 'household-step-ladders', 'category_id' => $catLadders->id],
                [
                    'name' => 'Household Safety Step Ladders',
                    'description' => '3-step to 5-step compact folding domestic safety ladders with wide steps.',
                    'image' => 'assets/images/product/8.webp',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            $subHeavyDuty = ProductSubcategory::updateOrCreate(
                ['slug' => 'heavy-duty-industrial-ladders', 'category_id' => $catLadders->id],
                [
                    'name' => 'Heavy-Duty Multi-Purpose Ladders',
                    'description' => '6-step to 8-step industrial grade high-tensile steel ladders with handrails.',
                    'image' => 'assets/images/product/8.webp',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'wellnox-pro-4step-safety-ladder'],
                [
                    'category_id' => $catLadders->id,
                    'subcategory_id' => $subHousehold->id,
                    'name' => 'Wellnox Pro 4-Step Folding Safety Ladder',
                    'short_description' => 'Wide anti-skid rubber steps with top comfort foam cushioned handgrip.',
                    'description' => 'High grade Mild Steel (MS) structure treated with seven-tank anti-rust powder coating. Holds up to 150 kg load safely.',
                    'image' => 'assets/images/product/8.webp',
                    'size' => '4 Steps (142cm Height)',
                    'color' => 'Silver & Coral Red',
                    'sort_order' => 1,
                    'status' => true,
                ]
            );

            Product::updateOrCreate(
                ['slug' => 'wellnox-heavy-duty-6step-industrial-ladder'],
                [
                    'category_id' => $catLadders->id,
                    'subcategory_id' => $subHeavyDuty->id,
                    'name' => 'Heavy Duty 6-Step Industrial Platform Ladder',
                    'short_description' => 'Reinforced tubular steel with wide non-slip platform and side safety braces.',
                    'description' => 'Built for warehouse, commercial and high-ceiling maintenance work. Includes tool tray on top handlebar.',
                    'image' => 'assets/images/product/8.webp',
                    'size' => '6 Steps (198cm Height)',
                    'color' => 'Industrial Orange & Black',
                    'sort_order' => 2,
                    'status' => true,
                ]
            );
        }
    }
}
