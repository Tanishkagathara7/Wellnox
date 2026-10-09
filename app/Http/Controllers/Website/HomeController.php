<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\StoreContactRequest;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display the main Wellnox homepage.
     */
    public function index()
    {
        // Centralized Placeholders / Images
        $placeholders = config('placeholders', []);

        // 1. Categories / Our Products (Database-driven active categories with fallback)
        $dbCategories = ProductCategory::active()->sorted()->get();

        if ($dbCategories->isNotEmpty()) {
            $categories = $dbCategories->map(function ($cat) {
                return [
                    'id' => $cat->slug,
                    'title' => $cat->name,
                    'subtitle' => $cat->description ?: 'Premium Wellnox Architectural Series',
                    'image' => $cat->image ?: 'assets/images/product/1.webp',
                    'link' => route('website.products', ['category' => $cat->slug]),
                ];
            })->toArray();
        } else {
            $categories = [
                [
                    'id' => 'floor-drains-gratings',
                    'title' => 'Floor Drains & Gratings',
                    'subtitle' => 'Shower Channel, Floor Drainers & Gratings',
                    'image' => 'assets/images/product/1.webp',
                    'link' => '#popular-designs',
                ],
                [
                    'id' => 'shower-channel-drainers',
                    'title' => 'Shower Channel Drainers',
                    'subtitle' => 'Architectural Linear Channel Solutions',
                    'image' => 'assets/images/product/2.webp',
                    'link' => '#popular-designs',
                ],
                [
                    'id' => 'bathroom-accessories',
                    'title' => 'Bathroom Accessories',
                    'subtitle' => 'Functional & Stylish Accessories for Every Space',
                    'image' => 'assets/images/product/3.webp',
                    'link' => '#categories',
                ],
                [
                    'id' => 'health-faucets',
                    'title' => 'Health Faucets',
                    'subtitle' => 'Hygienic, Durable & Modern',
                    'image' => 'assets/images/product/4.webp',
                    'link' => '#categories',
                ],
                [
                    'id' => 'ceramic-bathroom-accessories',
                    'title' => 'Ceramic Bathroom Accessories',
                    'subtitle' => 'Premium Design with a Touch of Elegance',
                    'image' => 'assets/images/product/5.webp',
                    'link' => '#categories',
                ],
                [
                    'id' => 'dish-racks-drainers',
                    'title' => 'Dish Racks & Drainers',
                    'subtitle' => 'Smart Organization for a Modern Kitchen',
                    'image' => 'assets/images/product/6.webp',
                    'link' => '#categories',
                ],
                [
                    'id' => 'cloth-drying-stands',
                    'title' => 'Cloth Drying Stands',
                    'subtitle' => 'Sturdy, Space-Saving & Long-Lasting',
                    'image' => 'assets/images/product/7.webp',
                    'link' => '#categories',
                ],
                [
                    'id' => 'ms-ladders-utility',
                    'title' => 'MS Ladders & Utility Products',
                    'subtitle' => 'Strong, Reliable & Versatile',
                    'image' => 'assets/images/product/8.webp',
                    'link' => '#categories',
                ],
            ];
        }

        // 2. Company Highlights & Numbers
        $companyStats = [
            [
                'icon' => 'bi-award',
                'number' => '20+',
                'numeric' => 20,
                'label' => 'Years of Experience',
            ],
            [
                'icon' => 'bi-grid-3x3-gap',
                'number' => 'Premium',
                'label' => 'Product Range',
            ],
            [
                'icon' => 'bi-globe2',
                'number' => 'Global',
                'label' => 'Quality Standards',
            ],
            [
                'icon' => 'bi-shield-check',
                'number' => 'Reliable',
                'label' => 'Performance',
            ],
        ];

        // 3. Why Wellnox Features Grid (All 10 Reasons to Choose Our Product)
        $features = [
            [
                'icon' => 'bi-pencil-square',
                'title' => 'High Drain Efficiency',
                'desc' => 'Designed to increase drain efficiency. Each design has variable high flow rate to drain speedily.',
            ],
            [
                'icon' => 'bi-layers',
                'title' => 'International Grade SS',
                'desc' => 'International grade stainless steel (SS) for best and lasting performance.',
            ],
            [
                'icon' => 'bi-person-check',
                'title' => 'Safety & Folded Edges',
                'desc' => 'Safety is key for installation and day-to-day usage. All sharp edges are folded inside & tapered outside.',
            ],
            [
                'icon' => 'bi-droplet-half',
                'title' => 'Gradient Slope Outlet',
                'desc' => 'Gradient slope towards outlet increases draining capacity and offers ease in manual cleaning.',
            ],
            [
                'icon' => 'bi-recycle',
                'title' => 'Globally Compliant',
                'desc' => 'Globally compliant 100% recyclable material.',
            ],
            [
                'icon' => 'bi-slash-circle',
                'title' => 'Anti-Cockroach Trap',
                'desc' => 'Anti-cockroach trap options available to control generic pests.',
            ],
            [
                'icon' => 'bi-gem',
                'title' => 'Global Quality Standards',
                'desc' => 'International quality standard raw material, craftsmanship and sizes to cater to global market.',
            ],
            [
                'icon' => 'bi-rulers',
                'title' => 'Customized Sizes & OE',
                'desc' => 'Customized product sizes and quality can be produced for corporate, OE sourcing and international market requirements.',
            ],
            [
                'icon' => 'bi-shield-check',
                'title' => 'Rust & Corrosion Resistant',
                'desc' => 'Higher grade SS are most resistant to rust and corrosion in constant humid conditions.',
            ],
            [
                'icon' => 'bi-book',
                'title' => 'Precision Engineered',
                'desc' => 'Precision engineered for easy installation and all essential provided.',
            ],
        ];

        // 4. Featured Products: Most Popular Designs (Database-driven products with fallback)
        $dbProducts = Product::with('category')->active()->sorted()->take(8)->get();

        if ($dbProducts->isNotEmpty()) {
            $popularProducts = $dbProducts->map(function ($prod) {
                return [
                    'id' => $prod->slug,
                    'name' => $prod->name,
                    'grade' => 'AISI 304 Certified',
                    'category' => $prod->category ? $prod->category->name : 'Architectural Series',
                    'image' => $prod->image_url,
                    'badge' => 'Bestseller',
                ];
            })->toArray();
        } else {
            $popularProducts = [
                [
                    'id' => 'square-drainer',
                    'name' => 'Square Drainer',
                    'grade' => 'AISI 304',
                    'category' => 'Floor Drainer',
                    'image' => $placeholders['product_square_drainer'] ?? 'assets/images/popular-product/1.webp',
                    'badge' => 'Bestseller',
                ],
                [
                    'id' => 'channel-drainer',
                    'name' => 'Channel Drainer',
                    'grade' => 'Regular Matt Finish',
                    'category' => 'Shower Channel',
                    'image' => $placeholders['product_channel_drainer'] ?? 'assets/images/popular-product/2.webp',
                    'badge' => 'Architect Choice',
                ],
                [
                    'id' => 'round-floor-drainer',
                    'name' => 'Round Floor Drainer',
                    'grade' => 'Mirror Finish',
                    'category' => 'Point Drainer',
                    'image' => $placeholders['product_round_drainer'] ?? 'assets/images/popular-product/3.webp',
                    'badge' => 'Popular',
                ],
                [
                    'id' => 'wave-channel-drainer',
                    'name' => 'Wave Channel Drainer',
                    'grade' => 'PVD Coated',
                    'category' => 'Shower Channel',
                    'image' => $placeholders['product_wave_channel'] ?? 'assets/images/popular-product/4.webp',
                    'badge' => 'Luxury Series',
                ],
                [
                    'id' => 'ceramic-bathroom-accessories',
                    'name' => 'Ceramic Bathroom Accessories',
                    'grade' => 'PVD Coated',
                    'category' => 'Premium Design with a Touch of Elegance',
                    'image' => 'assets/images/product/5.webp',
                    'badge' => 'Luxury Series',
                ],
                [
                    'id' => 'dish-racks-drainers',
                    'name' => 'Dish Racks & Drainers',
                    'grade' => 'PVD Coated',
                    'category' => 'Smart Organization for a Modern Kitchen',
                    'image' => 'assets/images/product/6.webp',
                    'badge' => 'Luxury Series',
                ],
                [
                    'id' => 'cloth-drying-stands',
                    'name' => 'Cloth Drying Stands',
                    'grade' => 'PVD Coated',
                    'category' => 'Sturdy, Space-Saving & Long-Lasting',
                    'image' => 'assets/images/product/7.webp',
                    'badge' => 'Luxury Series',
                ],
                [
                    'id' => 'ms-ladders-utility',
                    'name' => 'MS Ladders & Utility Products',
                    'grade' => 'PVD Coated',
                    'category' => 'Strong, Reliable & Versatile',
                    'image' => 'assets/images/product/8.webp',
                    'badge' => 'Luxury Series',
                ],
            ];
        }

        // 5. Available Finishes (Interactive Finish Selector matching reference screenshot)
        $finishes = [
            [
                'key' => 'matt',
                'name' => 'Regular Matt Finish',
                'image' => $placeholders['finish_matt'] ?? 'assets/products/finish-matt.png',
                'colorCode' => '#b0b3b5',
                'description' => 'Satin smooth brushed stainless steel AISI 304 with natural antimicrobial properties.',
                'tag' => 'Standard Classic',
            ],
            [
                'key' => 'mirror',
                'name' => 'Mirror (Glossy) Finish',
                'image' => $placeholders['finish_glossy'] ?? 'assets/products/finish-glossy.png',
                'colorCode' => '#e8ecef',
                'description' => 'High-gloss electro-buffed mirror finish that accentuates luxury bathroom aesthetics.',
                'tag' => 'Reflective Elegance',
            ],
            [
                'key' => 'gold',
                'name' => 'PVD Gold Finish',
                'image' => $placeholders['finish_gold'] ?? 'assets/products/finish-gold.png',
                'colorCode' => '#d4af37',
                'description' => 'Physical Vapor Deposition (PVD) titanium gold coating offering extreme scratch resistance.',
                'tag' => 'Royal Luxury',
            ],
            [
                'key' => 'rosegold',
                'name' => 'PVD Rose Gold Finish',
                'image' => $placeholders['finish_rosegold'] ?? 'assets/products/finish-rosegold.png',
                'colorCode' => '#b76e79',
                'description' => 'Warm, romantic PVD rose gold metallic coating tailored for modern luxury architectural suites.',
                'tag' => 'Warm Contemporary',
            ],
            [
                'key' => 'black',
                'name' => 'PVD Black Finish',
                'image' => $placeholders['finish_black'] ?? 'assets/products/finish-black.png',
                'colorCode' => '#212529',
                'description' => 'Deep matte PVD black finish engineered for minimalist and industrial designer interiors.',
                'tag' => 'Architectural Matte',
            ],
        ];

        // 6. Shower Channel Drainer Architectural Series (Catalog specifications)
        $drainerSeries = [
            [
                'code' => 'BH-4101',
                'name' => 'Palo',
                'type' => 'Square Perforated Pattern',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm',
            ],
            [
                'code' => 'BH-4102',
                'name' => 'Wave',
                'type' => 'Flowing S-Curve Perforation',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm',
            ],
            [
                'code' => 'BH-4103',
                'name' => 'Verticle',
                'type' => 'Linear Slotted Pattern',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm',
            ],
            [
                'code' => 'BH-4104',
                'name' => 'Tile / Marble Insert',
                'type' => 'Invisible Seamless Reversible Tray',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm',
            ],
            [
                'code' => 'BH-4105',
                'name' => 'Piano',
                'type' => 'Harmonic Key Pattern',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm',
            ],
            [
                'code' => 'BH-4108',
                'name' => 'Capsule',
                'type' => 'Modern Geometric Capsule Slots',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm',
            ],
        ];

        // 7. Manufacturing Process Flow (Direct from catalog page 8)
        $processSteps = [
            [
                'step' => '01',
                'name' => 'Raw Material Selection',
                'icon' => 'bi-shield-check',
                'tag' => 'AISI 304 / 316 Grade',
                'desc' => 'Certified high-tensile stainless steel sheets undergo spectroscopic verification for maximum corrosion resistance and durability.',
                'metric' => '100% Verified Quality',
            ],
            [
                'step' => '02',
                'name' => 'Precision Decoiling & Flattening',
                'icon' => 'bi-gear-wide-connected',
                'tag' => 'Automated Plate Leveling',
                'desc' => 'Hydraulic automated uncoiling and plate flattening eliminating micro-stress for millimeter-accurate base alignment.',
                'metric' => 'Zero Internal Tension',
            ],
            [
                'step' => '03',
                'name' => 'Fiber CNC Laser Cutting',
                'icon' => 'bi-crosshair',
                'tag' => 'Ultra-High Accuracy',
                'desc' => 'High-power fiber laser optics sculpt designer water perforation motifs with clean, burr-free razor precision edges.',
                'metric' => '±0.02 mm Precision',
            ],
            [
                'step' => '04',
                'name' => 'Deep Hydraulic Pressing',
                'icon' => 'bi-box-arrow-in-down',
                'tag' => 'Seamless Flow Slope',
                'desc' => 'Heavy tonnage hydraulic dies form the integrated sloping channel bed, guaranteeing continuous, zero-puddle drainage flow.',
                'metric' => 'Optimal Slope Gradient',
            ],
            [
                'step' => '05',
                'name' => 'Inner Beading & Safety Folding',
                'icon' => 'bi-bounding-box',
                'tag' => 'Barefoot Safe',
                'desc' => 'Edges are uniformly folded inwards and smoothly tapered outwards to ensure complete safety for barefoot users.',
                'metric' => '360° Safety Edge',
            ],
            [
                'step' => '06',
                'name' => 'Robotic Surface Buffing',
                'icon' => 'bi-disc',
                'tag' => 'Micro-Uniform Pre-Polish',
                'desc' => 'Automated abrasive stations eliminate microscopic contours, preparing the alloy surface for flawless architectural finishing.',
                'metric' => 'Uniform Ra Finish',
            ],
            [
                'step' => '07',
                'name' => 'Handcrafted Mirror & Satin Polishing',
                'icon' => 'bi-stars',
                'tag' => 'PVD & Hairline Finish',
                'desc' => 'Master artisans perform multi-stage electro-buffing for jewel-like mirror reflections or architectural satin brushed finishes.',
                'metric' => 'PVD Gold / Matt / Mirror',
            ],
            [
                'step' => '08',
                'name' => '100% Quality & Flow Testing',
                'icon' => 'bi-check-all',
                'tag' => 'Zero Defect Inspection',
                'desc' => 'Individual hydrostatic flow testing, acoustic checking, and strict optical calibration to ensure zero defects.',
                'metric' => '60L/min Flow Certified',
            ],
            [
                'step' => '09',
                'name' => 'Protective Multi-Layer Packaging',
                'icon' => 'bi-box-seam',
                'tag' => 'Scratch Protection',
                'desc' => 'Laser-peel protective film applied with corner cushions, boxed in reinforced master cartons for tamper-proof transit.',
                'metric' => 'Shockproof Foam Packed',
            ],
            [
                'step' => '10',
                'name' => 'Global Distribution & Dispatch',
                'icon' => 'bi-truck',
                'tag' => 'Pan-India & Global Export',
                'desc' => 'Rapid dispatch network serving leading architects, high-end builders, and authorized luxury showrooms worldwide.',
                'metric' => 'Worldwide Logistics',
            ],
        ];

        $companyFactoryImage = $placeholders['company_factory'] ?? 'assets/images/about-img.webp';
        $whyWellnoxBannerImage = $placeholders['why_wellnox_banner'] ?? 'assets/images/why-wellnox-banner.webp';
        $catalogueBookImage = $placeholders['catalogue_book'] ?? 'assets/images/catalogue-book.webp';
        $catalogueBgImage = $placeholders['catalogue_bg'] ?? 'assets/images/catalogue-cta-bg.webp';

        return view('home', compact(
            'categories',
            'companyStats',
            'features',
            'popularProducts',
            'finishes',
            'drainerSeries',
            'processSteps',
            'companyFactoryImage',
            'whyWellnoxBannerImage',
            'catalogueBookImage',
            'catalogueBgImage'
        ));
    }

    /**
     * Display the dedicated Premium About Us page.
     */
    public function about()
    {
        $placeholders = config('placeholders', []);

        $companyStats = [
            [
                'icon' => 'bi-award',
                'number' => '20+',
                'numeric' => 20,
                'label' => 'Years of Experience',
                'desc' => 'Pioneering manufacturing excellence since 2012.',
            ],
            [
                'icon' => 'bi-grid-3x3-gap',
                'number' => 'Premium',
                'label' => 'Product Range',
                'desc' => 'High-grade AISI 304 & 316 stainless steel.',
            ],
            [
                'icon' => 'bi-globe2',
                'number' => 'Global',
                'label' => 'Quality Standards',
                'desc' => 'Engineered for luxury Indian & international projects.',
            ],
            [
                'icon' => 'bi-shield-check',
                'number' => 'Reliable',
                'label' => 'Performance',
                'desc' => 'Superior durability & corrosion resistance.',
            ],
        ];

        // 10 Reasons to Choose Wellnox
        $features = [
            [
                'icon' => 'bi-pencil-square',
                'title' => 'High Drain Efficiency',
                'desc' => 'Engineered with high flow rate (40-60 L/min) to drain water swiftly without puddle formation.',
            ],
            [
                'icon' => 'bi-layers',
                'title' => 'AISI 304 / 316 Stainless Steel',
                'desc' => 'Certified high-tensile stainless steel alloy for everlasting strength and rust immunity.',
            ],
            [
                'icon' => 'bi-person-check',
                'title' => 'Safety & Folded Edges',
                'desc' => '360° barefoot safe construction with inward folded edges and smooth outer taper.',
            ],
            [
                'icon' => 'bi-droplet-half',
                'title' => 'Gradient Slope Outlet',
                'desc' => 'Integrated bottom gradient slope directing every drop into the central/side outlet with zero residue.',
            ],
            [
                'icon' => 'bi-recycle',
                'title' => 'Eco-Compliant & Recyclable',
                'desc' => 'Environmentally sustainable, 100% recyclable stainless steel material with zero chemical emissions.',
            ],
            [
                'icon' => 'bi-slash-circle',
                'title' => 'Anti-Cockroach & Odor Trap',
                'desc' => 'Mechanical & water seal anti-pest barriers to prevent foul odor, insects, and backflow.',
            ],
            [
                'icon' => 'bi-gem',
                'title' => 'Jewel-Grade PVD Finishes',
                'desc' => 'Physical Vapor Deposition titanium coatings in Gold, Rose Gold, Matte Black, and Mirror polish.',
            ],
            [
                'icon' => 'bi-rulers',
                'title' => 'Customized Sizes & OE Supply',
                'desc' => 'Custom length channels up to 2400mm and bespoke patterns for architectural and corporate projects.',
            ],
            [
                'icon' => 'bi-shield-check',
                'title' => 'Corrosion & Rust Proof',
                'desc' => 'Chromium-nickel rich metallurgy designed specifically for high-humidity wet bathroom environments.',
            ],
            [
                'icon' => 'bi-wrench-adjustable',
                'title' => 'Effortless Installation & Cleaning',
                'desc' => 'Supplied with precision levelling keys, lifting hooks, and hair catchers for effortless maintenance.',
            ],
        ];

        // 10-Stage Precision Manufacturing Flow
        $processSteps = [
            [
                'step' => '01',
                'name' => 'Raw Material Selection',
                'icon' => 'bi-shield-check',
                'tag' => 'AISI 304 / 316 Grade',
                'desc' => 'Spectroscopic composition testing guarantees certified stainless steel sheets with optimal tensile strength and zero impurities.',
                'metric' => '100% Verified Quality',
            ],
            [
                'step' => '02',
                'name' => 'Precision Decoiling & Flattening',
                'icon' => 'bi-gear-wide-connected',
                'tag' => 'Automated Plate Leveling',
                'desc' => 'Hydraulic uncoiling and plate stress-relief eliminating micro-tensions for laser-flat architectural base sheets.',
                'metric' => 'Zero Internal Tension',
            ],
            [
                'step' => '03',
                'name' => 'Fiber CNC Laser Cutting',
                'icon' => 'bi-crosshair',
                'tag' => 'Ultra-High Accuracy',
                'desc' => 'High-precision fiber laser cutting crafts intricate perforated designer motifs with micron-accurate, burr-free edges.',
                'metric' => '±0.02 mm Precision',
            ],
            [
                'step' => '04',
                'name' => 'Deep Hydraulic Pressing',
                'icon' => 'bi-box-arrow-in-down',
                'tag' => 'Seamless Flow Slope',
                'desc' => 'Heavy tonnage hydraulic dies form the integrated sloping channel bed, guaranteeing continuous, zero-puddle drainage flow.',
                'metric' => 'Optimal Slope Gradient',
            ],
            [
                'step' => '05',
                'name' => 'Inner Beading & Safety Folding',
                'icon' => 'bi-bounding-box',
                'tag' => 'Barefoot Safe',
                'desc' => 'Sheet edges are smoothly folded inward and tapered outward so that walking barefoot remains 100% comfortable and safe.',
                'metric' => '360° Safety Edge',
            ],
            [
                'step' => '06',
                'name' => 'Robotic Surface Buffing',
                'icon' => 'bi-disc',
                'tag' => 'Micro-Uniform Pre-Polish',
                'desc' => 'Automated abrasive stations eliminate microscopic surface variations, preparing the alloy for ultra-fine architectural finishing.',
                'metric' => 'Uniform Ra Finish',
            ],
            [
                'step' => '07',
                'name' => 'Handcrafted Mirror & Satin Polishing',
                'icon' => 'bi-stars',
                'tag' => 'PVD & Hairline Finish',
                'desc' => 'Master artisans perform multi-stage electro-buffing for jewel-like mirror reflections or architectural satin hairline finishes.',
                'metric' => 'PVD Gold / Matt / Mirror',
            ],
            [
                'step' => '08',
                'name' => '100% Flow & Hydrostatic Testing',
                'icon' => 'bi-check-all',
                'tag' => 'Zero Defect Inspection',
                'desc' => 'Every single drain unit undergoes water flow calibration, weld seam integrity checks, and optical surface verification.',
                'metric' => '60L/min Flow Certified',
            ],
            [
                'step' => '09',
                'name' => 'Protective Multi-Layer Packaging',
                'icon' => 'bi-box-seam',
                'tag' => 'Scratch Protection',
                'desc' => 'Laser-peel protective film applied with corner cushions, boxed in reinforced master cartons for tamper-proof transit.',
                'metric' => 'Shockproof Foam Packed',
            ],
            [
                'step' => '10',
                'name' => 'Global Distribution & Dispatch',
                'icon' => 'bi-truck',
                'tag' => 'Pan-India & Global Export',
                'desc' => 'Rapid dispatch network serving leading architects, high-end builders, and authorized luxury showrooms worldwide.',
                'metric' => 'Worldwide Logistics',
            ],
        ];

        // Catalogue Core Divisions
        $catalogueDivisions = [
            [
                'title' => 'Shower Channel Drainers & Gratings',
                'tag' => 'Architectural Drainage Systems',
                'desc' => 'Premium linear floor channels, square point drainers, tile-insert seamless covers, and round drainers crafted from heavy-gauge AISI 304 stainless steel.',
                'image' => 'assets/images/product/1.webp',
                'highlights' => ['Palo, Wave, Piano, Tile-Insert & Capsule Designs', 'High Water Evacuation (40-60 L/Min)', 'Center & Side Outlet Options', 'Anti-Cockroach Trap Included'],
                'sizes' => '300mm to 1500mm standard & custom lengths',
            ],
            [
                'title' => 'Luxury Bathroom Accessories',
                'tag' => 'Brass & Stainless Steel Series',
                'desc' => 'Towel rods, robe hooks, soap dish holders, tumbler holders, paper holders, and grab bars combining minimalist aesthetics and durable construction.',
                'image' => 'assets/images/product/3.webp',
                'highlights' => ['Multi-layer PVD & Electroplated Chrome', 'Heavy Solid Brass / SS 304 Mounting Base', 'Concealed Screw Installation', 'Moisture & Steam Proof Guarantee'],
                'sizes' => 'Complete matching bathroom suites',
            ],
            [
                'title' => 'Ceramic Bathroom Accessories',
                'tag' => 'Handcrafted Luxury Ceramic Collection',
                'desc' => 'High-fired ceramic lotion dispensers, tumbler cups, soap dishes, and toothbrush holders featuring marble-vein finishes and metallic accents.',
                'image' => 'assets/images/product/5.webp',
                'highlights' => ['High-Density Glazed Porcelain', 'Precision Brass & Gold Dispenser Pumps', 'Stain Resistant & Easy to Clean', 'Minimalist Contemporary Palettes'],
                'sizes' => 'Individual & 4-Piece Vanity Sets',
            ],
            [
                'title' => 'Health Faucets & Precision Sprays',
                'tag' => 'Hydro-Dynamic Hygiene Systems',
                'desc' => 'Ergonomic stainless steel and brass bidet sprays with flexible anti-tangle reinforced hoses and pressure-optimized aerators.',
                'image' => 'assets/images/product/4.webp',
                'highlights' => ['High-Pressure Soft Flow Aeration', 'Corrosion-Resistant SS 304 Trigger', 'Flexible 1.2m Anti-Twist Hose', 'Wall Hook with Mounting Hardware'],
                'sizes' => 'Standard 1/2" Universal Thread',
            ],
            [
                'title' => 'Modular Kitchen Dish Racks & Drainers',
                'tag' => 'Culinary Organization Solutions',
                'desc' => 'Stainless steel countertop and in-cabinet dish drying racks with removable drainage trays, utensil caddies, and anti-slip rubber pads.',
                'image' => 'assets/images/product/6.webp',
                'highlights' => ['Heavy Gauge Rust-Proof Stainless Steel', 'Integrated Sloping Drip Tray', 'Cutlery Holder & Glass Hooks Included', 'High Weight Capacity'],
                'sizes' => 'Single & Double Tier Models',
            ],
            [
                'title' => 'Cloth Drying Stands & Ladders',
                'tag' => 'Home Utility & Heavy Duty Series',
                'desc' => 'Collapsible heavy-duty stainless steel drying stands and powder-coated MS step ladders engineered for maximum stability and compact storage.',
                'image' => 'assets/images/product/7.webp',
                'highlights' => ['Heavy Load Capacity & Wide Steps', 'Anti-Skid Rubber Feet & Safety Locks', 'Foldable Compact Space-Saving Design', 'Weather-Resistant Protective Coating'],
                'sizes' => '3-Step to 7-Step Ladders & Multi-Wing Stands',
            ],
        ];

        // Architectural Finishes
        $finishes = [
            [
                'name' => 'Regular Matt Finish',
                'code' => 'SS Brushed',
                'desc' => 'Natural satin hairline texture with fingerprint-resistant matte sheen.',
                'color' => '#A8ADB3',
                'badge' => 'Classic Architectural',
            ],
            [
                'name' => 'Mirror Glossy Finish',
                'code' => 'Electro-Buffed',
                'desc' => 'High-reflectivity jewel polish that amplifies spatial luxury.',
                'color' => '#E6ECF0',
                'badge' => 'Reflective Luxury',
            ],
            [
                'name' => 'PVD Titanium Gold',
                'code' => 'PVD Vapor Coat',
                'desc' => 'Warm, regal gold metallic finish with extreme abrasion resistance.',
                'color' => '#D4AF37',
                'badge' => 'Royal Luxury',
            ],
            [
                'name' => 'PVD Warm Rose Gold',
                'code' => 'PVD Vapor Coat',
                'desc' => 'Sophisticated champagne rose tone tailored for warm stone tiles.',
                'color' => '#C48A7D',
                'badge' => 'Contemporary Warmth',
            ],
            [
                'name' => 'PVD Deep Matte Black',
                'code' => 'PVD Vapor Coat',
                'desc' => 'Bold, velvety black finish engineered for minimalist industrial spaces.',
                'color' => '#212529',
                'badge' => 'Modern Minimalist',
            ],
        ];

        // Core Company Values & Principles
        $values = [
            [
                'icon' => 'bi-bullseye',
                'title' => 'Precision Engineering',
                'desc' => 'Every dimension, perforation, and fold is calibrated with laser accuracy to guarantee flawless installation and decades of hassle-free performance.',
            ],
            [
                'icon' => 'bi-shield-check',
                'title' => 'Uncompromising Material Quality',
                'desc' => 'We strictly utilize certified AISI 304 and AISI 316 grade stainless steel, ensuring zero corrosion, complete barefoot safety, and eco-friendly recyclability.',
            ],
            [
                'icon' => 'bi-lightbulb',
                'title' => 'Aesthetic Innovation',
                'desc' => 'Blending functional water drainage with architectural beauty through flowing laser motifs, PVD color coatings, and invisible tile-insert options.',
            ],
            [
                'icon' => 'bi-heart-pulse',
                'title' => 'Customer-Centric Commitment',
                'desc' => 'From tailored OEM dimensions for mega infrastructure to responsive after-sales support for residential homeowners, client satisfaction remains our benchmark.',
            ],
            [
                'icon' => 'bi-hammer',
                'title' => 'Specialized Sanitary Hardware',
                'desc' => 'Expertise in heavy stainless steel fasteners, wall-hung lavatory brackets, washbasin fixings, and cast iron brackets built for enduring load resistance.',
            ],
            [
                'icon' => 'bi-recycle',
                'title' => 'Sustainable & Recyclable',
                'desc' => 'All Wellnox stainless steel products are 100% recyclable, reducing environmental footprints with zero harmful coatings or toxic chemical runoff.',
            ],
        ];

        // Dedicated Mission, Vision & Core Philosophy
        $philosophy = [
            'mission' => [
                'title' => 'Our Mission',
                'icon' => 'bi-compass',
                'lead' => 'Empowering living spaces through engineered perfection, durable alloys, and architectural distinction.',
                'desc' => 'To design and manufacture international-grade drainage systems, luxury bathroom accessories, and specialized sanitary fasteners that exceed global standards of durability, water evacuation efficiency, and aesthetic refinement.',
            ],
            'vision' => [
                'title' => 'Our Vision',
                'icon' => 'bi-eye',
                'lead' => 'Engineering the Future of Drainage and Bathroom Living Solutions worldwide.',
                'desc' => 'To be recognized globally as the premier brand of architectural stainless steel drainage, luxury sanitary fittings, and precision hardware — synonymous with enduring Indian craftsmanship, technological innovation, and trust.',
            ],
            'core_value' => [
                'title' => 'Our Core Value',
                'icon' => 'bi-gem',
                'lead' => 'Uncompromising integrity in raw materials, craftsmanship, and customer partnership.',
                'desc' => 'We believe true luxury is built on trust and longevity. From verified AISI 304/316 metallurgy to 100% flow-tested reliability, our dedication to precision guarantees peace of mind for architects, developers, and homeowners alike.',
            ],
        ];

        // Verified Customer & Architect Testimonials
        $testimonials = [
            [
                'quote' => 'Wellnox linear shower channels transformed our penthouse bathrooms. The gradient slope drains water instantly, and the PVD Rose Gold finish perfectly matches our Italian marble.',
                'author' => 'Ar. Rajesh Mehta',
                'role' => 'Principal Architect, Studio Forma',
                'location' => 'Mumbai, India',
                'rating' => 5,
            ],
            [
                'quote' => 'The folded inner safety edges and certified AISI 304 steel make Wellnox our number one recommendation for luxury residential townships. The quality is truly international.',
                'author' => 'Vikram Singhania',
                'role' => 'Project Director, Skyline Developers',
                'location' => 'Ahmedabad, India',
                'rating' => 5,
            ],
            [
                'quote' => 'Outstanding durability and sleek aesthetics. We installed Wellnox shower channels and bathroom accessories across 120 luxury resort villas with zero maintenance complaints.',
                'author' => 'Sanjay Patel',
                'role' => 'Hospitality Infrastructure Consultant',
                'location' => 'Goa, India',
                'rating' => 5,
            ],
        ];

        $companyFactoryImage = $placeholders['company_factory'] ?? 'assets/images/about-img.webp';
        $whyWellnoxBannerImage = $placeholders['why_wellnox_banner'] ?? 'assets/images/why-wellnox-banner.webp';
        $catalogueBookImage = $placeholders['catalogue_book'] ?? 'assets/images/catalogue-book.webp';
        $catalogueBgImage = $placeholders['catalogue_bg'] ?? 'assets/images/catalogue-cta-bg.webp';

        return view('about', compact(
            'companyStats',
            'features',
            'processSteps',
            'catalogueDivisions',
            'finishes',
            'values',
            'philosophy',
            'testimonials',
            'companyFactoryImage',
            'whyWellnoxBannerImage',
            'catalogueBookImage',
            'catalogueBgImage'
        ));
    }

    /**
     * Display the dedicated, premium "Why Wellnox" architectural page.
     */
    public function whyWellnox()
    {
        $placeholders = config('placeholders', []);

        // 1. The 6 Core Wellnox Advantages for the Interactive Radial / Architectural System
        $advantages = [
            [
                'id' => 'premium-materials',
                'num' => '01',
                'title' => 'Premium Materials',
                'tagline' => 'Certified AISI 304/316 Metallurgy',
                'desc' => 'High-grade stainless steel selected for structural durability, lifelong corrosion immunity, and refined architectural finishes in high-humidity zones.',
                'icon' => 'bi-layers',
                'stat' => '18/8 & 18/10',
                'stat_lbl' => 'Certified Chromium-Nickel Alloy',
                'image' => 'assets/images/popular-product/1.webp',
                'quote' => 'Zero toxic emissions, 100% recyclable, and impervious to daily cleaning chemicals.',
            ],
            [
                'id' => 'precision-engineering',
                'num' => '02',
                'title' => 'Precision Engineering',
                'tagline' => 'Micron-Calibrated Laser & Pressing',
                'desc' => 'Engineered with accuracy to deliver consistent performance, micron-flush fitment against luxury tiles, and frictionless water evacuation.',
                'icon' => 'bi-crosshair',
                'stat' => '±0.02 mm',
                'stat_lbl' => 'CNC Fiber Cutting Tolerance',
                'image' => 'assets/images/popular-product/2.webp',
                'quote' => 'Custom channel lengths up to 2400mm crafted with exact laser-cut tolerances.',
            ],
            [
                'id' => 'modern-design',
                'num' => '03',
                'title' => 'Modern Design',
                'tagline' => 'Contemporary Architectural Aesthetics',
                'desc' => 'Contemporary designs created for sophisticated architectural spaces, blending seamlessly into Italian marble, terrazzo, and porcelain slabs.',
                'icon' => 'bi-gem',
                'stat' => 'PVD & Hairline',
                'stat_lbl' => 'Luxury Titanium Color Coatings',
                'image' => 'assets/images/popular-product/4.webp',
                'quote' => 'Palo, Wave, Piano, and seamless tile-insert grates tailored for luxury living.',
            ],
            [
                'id' => 'quality-control',
                'num' => '04',
                'title' => 'Quality Control',
                'tagline' => 'Multi-Stage Defect-Free Verification',
                'desc' => 'Detailed inspection at critical stages to maintain consistent standards, including spectroscopic analysis and 100% hydrostatic flow audits.',
                'icon' => 'bi-shield-check',
                'stat' => '60 L/Min',
                'stat_lbl' => 'Hydrostatic Evacuation Tested',
                'image' => 'assets/images/popular-product/3.webp',
                'quote' => 'Every unit is individually pressure-calibrated before protective packaging.',
            ],
            [
                'id' => 'long-lasting-performance',
                'num' => '05',
                'title' => 'Long-Lasting Performance',
                'tagline' => 'Decades of Dependable Reliability',
                'desc' => 'Products designed to perform reliably for years with integrated gradient slope, inward folded barefoot-safe rims, and clog-free traps.',
                'icon' => 'bi-award',
                'stat' => '20+ Years',
                'stat_lbl' => 'Proven Manufacturing Heritage',
                'image' => 'assets/images/popular-product/1.webp',
                'quote' => 'Built to outlast the life of your luxury bathroom installation.',
            ],
            [
                'id' => 'customer-focus',
                'num' => '06',
                'title' => 'Customer Focus',
                'tagline' => 'Tailored Project & OEM Solutions',
                'desc' => 'Solutions developed around real project and customer requirements, offering custom sizing, architect assistance, and global OEM sourcing.',
                'icon' => 'bi-people',
                'stat' => 'Pan-India & Global',
                'stat_lbl' => 'Architect & Developer Network',
                'image' => 'assets/images/popular-product/2.webp',
                'quote' => 'Dedicated engineering support from concept drawings to on-site installation.',
            ],
        ];

        // 2. Technical Highlights for Engineering / Manufacturing Split Screen
        $technicalHighlights = [
            [
                'title' => 'Advanced Manufacturing',
                'subtitle' => 'Automated Fiber Laser & Hydraulic Stations',
                'desc' => 'Utilizing advanced high-wattage CNC fiber lasers and deep-draw hydraulic forming presses for burr-free, uniform metalwork.',
                'icon' => 'bi-cpu',
            ],
            [
                'title' => 'Precision Fabrication',
                'subtitle' => 'Integrated Slope & 360° Folded Edges',
                'desc' => 'Compound gradient slopes formed directly into the channel bed combined with smooth inward-folded safety edges for barefoot security.',
                'icon' => 'bi-rulers',
            ],
            [
                'title' => 'Quality Inspection',
                'subtitle' => 'Multi-Point Hydrostatic Flow Verification',
                'desc' => '100% flow calibration and weld-joint integrity testing ensure rapid water evacuation with zero backflow or odor seepage.',
                'icon' => 'bi-patch-check',
            ],
            [
                'title' => 'Premium Materials',
                'subtitle' => 'Certified AISI 304 & 316 Stainless Steel',
                'desc' => 'High chromium and nickel alloy content delivering extreme tensile strength, zero oxidation, and enduring luster.',
                'icon' => 'bi-shield-shaded',
            ],
        ];

        // 3. Quality Journey: 6-Stage Engineering Dashboard Flow
        $qualityJourney = [
            [
                'step' => '01',
                'title' => 'Material Selection',
                'badge' => 'Spectro-Certified SS',
                'desc' => 'Chemical composition testing guarantees pure AISI 304 alloy coils with optimal tensile strength and zero impurities.',
                'metric' => 'AISI 304 / 316',
                'icon' => 'bi-shield-check',
            ],
            [
                'step' => '02',
                'title' => 'Precision Manufacturing',
                'badge' => 'CNC Fiber & Hydraulic',
                'desc' => 'High-tonnage hydraulic presses and laser cutting craft seamless sloping channel bodies with exact tolerances.',
                'metric' => '±0.02 mm Accuracy',
                'icon' => 'bi-gear-wide-connected',
            ],
            [
                'step' => '03',
                'title' => 'Surface Finishing',
                'badge' => 'Robotic & PVD Artistry',
                'desc' => 'Multi-stage electro-buffing followed by vacuum physical vapor deposition for rich Gold, Rose Gold, Matt Black, or Mirror shine.',
                'metric' => 'Jewel-Grade PVD',
                'icon' => 'bi-stars',
            ],
            [
                'step' => '04',
                'title' => 'Quality Inspection',
                'badge' => 'Micron Tolerance Audit',
                'desc' => 'Comprehensive physical inspection verifying inward-folded rims, optical flatness, and welded seam integrity.',
                'metric' => '100% Checked',
                'icon' => 'bi-eye',
            ],
            [
                'step' => '05',
                'title' => 'Final Testing',
                'badge' => 'Hydrostatic Flow Test',
                'desc' => 'Dynamic water flow testing ensures rapid 60 L/min evacuation and infallible mechanical odor trap seal operation.',
                'metric' => 'Zero Residue',
                'icon' => 'bi-droplet-half',
            ],
            [
                'step' => '06',
                'title' => 'Reliable Product',
                'badge' => 'Shockproof Packaging',
                'desc' => 'Protective peel-off film and foam-cushioned master cartons deliver pristine, job-site ready channels across the globe.',
                'metric' => 'Ready for Install',
                'icon' => 'bi-box-seam',
            ],
        ];

        // 4. Why Customers Choose Wellnox (4 Large Editorial Blocks)
        $editorialBlocks = [
            [
                'num' => '01',
                'title' => 'Reliable Quality',
                'subtitle' => 'Uncompromising Material Purity',
                'desc' => 'From the initial raw stainless-steel alloy batch to the final polished mirror finish, every Wellnox product reflects relentless devotion to quality. Certified AISI 304 metallurgy safeguards your architectural projects against pitting, corrosion, and structural wear for decades.',
                'badge' => 'Certified Durability',
                'image' => 'assets/images/popular-product/1.webp',
            ],
            [
                'num' => '02',
                'title' => 'Thoughtful Design',
                'subtitle' => 'Barefoot Safety & Minimalist Cleanliness',
                'desc' => 'True luxury lies in unseen details: inward-folded safety edges that eliminate dangerous sharp corners, integrated gradient channel slopes that eliminate standing puddles, and magnetic or mechanical odor-traps that maintain pristine bathroom air.',
                'badge' => 'Human-Centric Engineering',
                'image' => 'assets/images/popular-product/2.webp',
            ],
            [
                'num' => '03',
                'title' => 'Engineering Excellence',
                'subtitle' => 'Sub-Millimeter Production Standards',
                'desc' => 'Our Rajkot manufacturing facility combines automated laser contouring with precision hydraulic dies. This ensures that every grating, channel body, and accessory installs seamlessly flush with premium marble, granite, and porcelain flooring.',
                'badge' => 'Micron-Level Precision',
                'image' => 'assets/images/popular-product/4.webp',
            ],
            [
                'num' => '04',
                'title' => 'Long-Term Value',
                'subtitle' => 'Sustainable Lifetime Investment',
                'desc' => 'Wellnox sanitary and utility solutions are built to outlast the tiles they rest in. With 100% recyclable green materials, minimal maintenance needs, and universal plumbing compatibility, Wellnox delivers unmatched lifecycle value to architects and homeowners.',
                'badge' => 'Lifetime Reliability',
                'image' => 'assets/images/popular-product/3.webp',
            ],
        ];

        // 5. Animated Numbers / Trust Statistics
        $trustStats = [
            [
                'number' => '20+',
                'numeric' => 20,
                'suffix' => '+',
                'label' => 'Years of Experience',
                'sub' => 'Crafting precision solutions since 2000',
            ],
            [
                'number' => '500+',
                'numeric' => 500,
                'suffix' => '+',
                'label' => 'Product Range',
                'sub' => 'Channels, gratings & utility accessories',
            ],
            [
                'number' => '100%',
                'numeric' => 100,
                'suffix' => '%',
                'label' => 'Quality Focus',
                'sub' => 'Individually verified manufacturing',
            ],
            [
                'number' => 'Global',
                'numeric' => null,
                'suffix' => '',
                'label' => 'Quality Standards',
                'sub' => 'AISI 304 & international compliance',
            ],
        ];

        // 6. Our Commitment Principles (Warm Cream Section)
        $commitmentPrinciples = [
            [
                'title' => 'Innovation',
                'desc' => 'Constantly pioneering sleeker profiles, higher evacuation rates, and modern architectural PVD surface finishes to keep pace with contemporary interior trends.',
                'icon' => 'bi-lightbulb',
            ],
            [
                'title' => 'Consistency',
                'desc' => 'Rigorous tooling maintenance and micron fabrication ensure identical dimensions, seamless fittings, and uniform excellence across small or high-volume orders.',
                'icon' => 'bi-bullseye',
            ],
            [
                'title' => 'Responsibility',
                'desc' => '100% recyclable green materials and zero-chemical manufacturing practices deliver safe, eco-conscious drainage that protects our shared environment.',
                'icon' => 'bi-globe-americas',
            ],
        ];

        $bannerImage = $placeholders['why_wellnox_banner'] ?? 'assets/images/why-wellnox-banner.webp';
        $heroBgImage = $placeholders['hero'] ?? 'assets/images/hero-bg.png';
        $catalogueBookImage = $placeholders['catalogue_book'] ?? 'assets/images/catalogue-book.webp';
        $catalogueBgImage = $placeholders['catalogue_bg'] ?? 'assets/images/catalogue-cta-bg.webp';

        return view('why-wellnox', compact(
            'advantages',
            'technicalHighlights',
            'qualityJourney',
            'editorialBlocks',
            'trustStats',
            'commitmentPrinciples',
            'bannerImage',
            'heroBgImage',
            'catalogueBookImage',
            'catalogueBgImage'
        ));
    }

    /**
     * Display the dedicated, premium "Contact Us" page.
     */
    public function contact()
    {
        $contactInfo = [
            'head_office' => [
                'title' => 'Head Office & Works',
                'value' => 'Virva, Rajkot - 360024, (Gujarat) India.',
                'icon' => 'bi-geo-alt',
                'link' => 'https://maps.google.com/?q=Virva+Rajkot+360024+Gujarat+India',
            ],
            'phone' => [
                'title' => 'Direct Sales Line',
                'value' => '+91 98765 43210',
                'icon' => 'bi-telephone',
                'link' => 'tel:+919876543210',
            ],
            'email' => [
                'title' => 'Inquiries & Orders',
                'value' => 'sales@wellnox.co',
                'icon' => 'bi-envelope-at',
                'link' => 'mailto:sales@wellnox.co',
            ],
            'website' => [
                'title' => 'Official Portal',
                'value' => 'www.wellnox.co',
                'icon' => 'bi-globe2',
                'link' => 'https://www.wellnox.co',
            ],
        ];

        $trustPillars = [
            [
                'icon' => 'bi-clock-history',
                'title' => 'Rapid 24-Hour Response',
                'desc' => 'Our technical engineers evaluate project drawings and deliver itemized quotes within 24 hours.',
            ],
            [
                'icon' => 'bi-shield-check',
                'title' => 'Certified AISI 304 / 316',
                'desc' => 'Guaranteed genuine stainless steel alloy with spectroscopic testing certificates.',
            ],
            [
                'icon' => 'bi-rulers',
                'title' => 'Custom Sizes & OEM Supply',
                'desc' => 'Bespoke channel lengths up to 2400mm and private-label fabrication for major projects.',
            ],
            [
                'icon' => 'bi-person-check',
                'title' => 'Dedicated Project Specialist',
                'desc' => 'Direct engineering support for architects, interior designers, builders, and MEP consultants.',
            ],
        ];

        return view('contact', compact('contactInfo', 'trustPillars'));
    }

    /**
     * Handle requirement / quote request submission: saves into `contacts` database and sends email.
     */
    public function submitQuote(StoreContactRequest $request)
    {
        $validated = $request->validated();
        $messageContent = $request->input('message') ?: $request->input('description');

        // 1. Mandatory Database Entry into contacts table
        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => $request->input('subject') ?: 'Website Product Requirement / Custom Quote',
            'message' => $messageContent,
            'status' => 'new',
        ]);

        $adminEmail = env('ADMIN_EMAIL', 'rohantechmatrix@gmail.com');

        // 2. Email Delivery with creative blade template
        try {
            Mail::send('emails.quote-inquiry', [
                'data' => [
                    'name' => $contact->name,
                    'phone' => $contact->phone,
                    'email' => $contact->email,
                    'description' => $contact->message,
                ],
            ], function ($message) use ($contact, $adminEmail) {
                $message->to($adminEmail, 'Wellnox Inquiries')
                    ->subject('New Customer Requirement: '.$contact->name.' | Wellnox Lead #'.$contact->id)
                    ->replyTo($contact->email, $contact->name);
            });

            Log::info('Lead successfully recorded in database (ID: '.$contact->id.') and email dispatched to '.$adminEmail);
        } catch (\Exception $e) {
            Log::error('Lead recorded in DB (ID: '.$contact->id.') but email dispatch failed: '.$e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Thank you for connecting! Your requirement has been emailed and our team will get in touch shortly.',
            'lead_id' => $contact->id,
        ]);
    }

    /**
     * Display the rich, marvelous 7-Categories > Subcategories > Products showcase page.
     */
    public function products(Request $request)
    {
        $placeholders = config('placeholders', []);

        // Load all 7 Categories with their active Subcategories
        $categories = ProductCategory::active()
            ->sorted()
            ->with(['subcategories' => function ($q) {
                $q->active()->sorted();
            }])
            ->get();

        // Selected Category
        $selectedCategorySlug = $request->query('category');
        $selectedCategory = $selectedCategorySlug
            ? $categories->firstWhere('slug', $selectedCategorySlug)
            : $categories->first();

        // If no category found with that slug, fallback to first
        if (! $selectedCategory && $categories->isNotEmpty()) {
            $selectedCategory = $categories->first();
        }

        // Selected Subcategory
        $selectedSubcategorySlug = $request->query('subcategory');
        $selectedSubcategory = null;
        if ($selectedCategory && $selectedSubcategorySlug) {
            $selectedSubcategory = $selectedCategory->subcategories->firstWhere('slug', $selectedSubcategorySlug);
        }

        // Build product query
        $productsQuery = Product::with(['category', 'subcategory'])->active()->sorted();

        if ($selectedCategory) {
            $productsQuery->where('category_id', $selectedCategory->id);
        }

        if ($selectedSubcategory) {
            $productsQuery->where('subcategory_id', $selectedSubcategory->id);
        }

        if ($request->filled('color')) {
            $colorFilter = $request->query('color');
            if ($colorFilter === 'has_color') {
                $productsQuery->whereNotNull('color')->where('color', '!=', '');
            } elseif ($colorFilter === 'no_color') {
                $productsQuery->where(function ($q) {
                    $q->whereNull('color')->orWhere('color', '');
                });
            } else {
                $productsQuery->where('color', 'like', "%{$colorFilter}%");
            }
        }

        if ($request->filled('search')) {
            $search = $request->query('search');
            $productsQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('size', 'like', "%{$search}%")
                    ->orWhere('color', 'like', "%{$search}%");
            });
        }

        $products = $productsQuery->paginate(12)->withQueryString();

        // Collect available colors for filter
        $availableColors = Product::active()
            ->whereNotNull('color')
            ->where('color', '!=', '')
            ->distinct()
            ->pluck('color')
            ->filter()
            ->values();

        return view('products.index', compact(
            'categories',
            'selectedCategory',
            'selectedSubcategory',
            'products',
            'availableColors'
        ));
    }

    /**
     * Display single product detail modal/page.
     */
    public function productDetail(Product $product)
    {
        $product->load(['category', 'subcategory']);

        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('_id', '!=', $product->_id ?? $product->id)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
