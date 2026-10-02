<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        // Centralized Placeholders / Images
        $placeholders = config('placeholders');

        // 1. Categories / Our Products (8 Complete Home Solution Cards)
        $categories = [
            [
                'id' => 'drain-system',
                'title' => 'Drain System',
                'subtitle' => 'Shower Channel, Floor Drainers & Gratings',
                'image' => 'assets/images/product/1.webp',
                'link' => '#popular-designs',
            ],
            [
                'id' => 'shower-channel-drainers',
                'title' => 'Shower Channel Drainers',
                'subtitle' => 'Modern Designs for Seamless Floor',
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
            ]
        ];

        // 2. Company Highlights & Numbers
        $companyStats = [
            [
                'icon' => 'bi-award',
                'number' => '20+',
                'label' => 'Years of Experience'
            ],
            [
                'icon' => 'bi-grid-3x3-gap',
                'number' => 'Wide',
                'label' => 'Product Range'
            ],
            [
                'icon' => 'bi-globe2',
                'number' => 'Global',
                'label' => 'Supply Network'
            ],
            [
                'icon' => 'bi-shield-check',
                'number' => 'Quality',
                'label' => 'Assurance'
            ]
        ];

        // 3. Why Wellnox Features Grid (All 10 Reasons to Choose Our Product)
        $features = [
            [
                'icon' => 'bi-pencil-square',
                'title' => 'High Drain Efficiency',
                'desc' => 'Designed to increase drain efficiency. Each design has variable high flow rate to drain speedily.'
            ],
            [
                'icon' => 'bi-layers',
                'title' => 'International Grade SS',
                'desc' => 'International grade stainless steel (SS) for best and lasting performance.'
            ],
            [
                'icon' => 'bi-person-check',
                'title' => 'Safety & Folded Edges',
                'desc' => 'Safety is key for installation and day-to-day usage. All sharp edges are folded inside & tapered outside.'
            ],
            [
                'icon' => 'bi-droplet-half',
                'title' => 'Gradient Slope Outlet',
                'desc' => 'Gradient slope towards outlet increases draining capacity and offers ease in manual cleaning.'
            ],
            [
                'icon' => 'bi-recycle',
                'title' => 'Globally Compliant',
                'desc' => 'Globally compliant 100% recyclable material.'
            ],
            [
                'icon' => 'bi-slash-circle',
                'title' => 'Anti-Cockroach Trap',
                'desc' => 'Anti-cockroach trap options available to control generic pests.'
            ],
            [
                'icon' => 'bi-gem',
                'title' => 'Global Quality Standards',
                'desc' => 'International quality standard raw material, craftsmanship and sizes to cater to global market.'
            ],
            [
                'icon' => 'bi-rulers',
                'title' => 'Customized Sizes & OE',
                'desc' => 'Customized product sizes and quality can be produced for corporate, OE sourcing and international market requirements.'
            ],
            [
                'icon' => 'bi-shield-check',
                'title' => 'Rust & Corrosion Resistant',
                'desc' => 'Higher grade SS are most resistant to rust and corrosion in constant humid conditions.'
            ],
            [
                'icon' => 'bi-book',
                'title' => 'Precision Engineered',
                'desc' => 'Precision engineered for easy installation and all essential provided.'
            ]
        ];

        // 4. Featured Products: Most Popular Designs (Carousel / Slider)
        $popularProducts = [
            [
                'id' => 'square-drainer',
                'name' => 'Square Drainer',
                'grade' => 'AISI 304',
                'category' => 'Floor Drainer',
                'image' => $placeholders['product_square_drainer'] ?? 'assets/images/popular-product/1.webp',
                'badge' => 'Bestseller'
            ],
            [
                'id' => 'channel-drainer',
                'name' => 'Channel Drainer',
                'grade' => 'Regular Matt Finish',
                'category' => 'Shower Channel',
                'image' => $placeholders['product_channel_drainer'] ?? 'assets/images/popular-product/2.webp',
                'badge' => 'Architect Choice'
            ],
            [
                'id' => 'round-floor-drainer',
                'name' => 'Round Floor Drainer',
                'grade' => 'Mirror Finish',
                'category' => 'Floor Drainer',
                'image' => $placeholders['product_round_drainer'] ?? 'assets/images/popular-product/3.webp',
                'badge' => 'Classic'
            ],
            [
                'id' => 'wave-channel-drainer',
                'name' => 'Wave Channel Drainer',
                'grade' => 'PVD Coated',
                'category' => 'Shower Channel',
                'image' => $placeholders['product_wave_channel'] ?? 'assets/images/popular-product/4.webp',
                'badge' => 'Luxury Series'
            ],
            [
                'id' => 'ceramic-bathroom-accessories',
                'name' => 'Ceramic Bathroom Accessories',
                'grade' => 'PVD Coated',
                'category' => 'Premium Design with a Touch of Elegance',
                'image' => 'assets/images/product/5.webp',
                'badge' => 'Luxury Series'
            ],
            [
                'id' => 'dish-racks-drainers',
                'name' => 'Dish Racks & Drainers',
                'grade' => 'PVD Coated',
                'category' => 'Smart Organization for a Modern Kitchen',
                'image' => 'assets/images/product/6.webp',
                'badge' => 'Luxury Series'
            ],
            [
                'id' => 'cloth-drying-stands',
                'name' => 'Cloth Drying Stands',
                'grade' => 'PVD Coated',
                'category' => 'Sturdy, Space-Saving & Long-Lasting',
                'image' => 'assets/images/product/7.webp',
                'badge' => 'Luxury Series'
            ],
            [
                'id' => 'ms-ladders-utility',
                'name' => 'MS Ladders & Utility Products',
                'grade' => 'PVD Coated',
                'category' => 'Strong, Reliable & Versatile',
                'image' => 'assets/images/product/8.webp',
                'badge' => 'Luxury Series'
            ]
        ];

        // 5. Available Finishes (Interactive Finish Selector matching reference screenshot)
        $finishes = [
            [
                'key' => 'matt',
                'name' => 'Regular Matt Finish',
                'image' => $placeholders['finish_matt'] ?? 'assets/products/finish-matt.png',
                'colorCode' => '#b0b3b5',
                'description' => 'Satin smooth brushed stainless steel AISI 304 with natural antimicrobial properties.',
                'tag' => 'Standard Classic'
            ],
            [
                'key' => 'mirror',
                'name' => 'Mirror (Glossy) Finish',
                'image' => $placeholders['finish_glossy'] ?? 'assets/products/finish-glossy.png',
                'colorCode' => '#e8ecef',
                'description' => 'High-gloss electro-buffed mirror finish that accentuates luxury bathroom aesthetics.',
                'tag' => 'Reflective Elegance'
            ],
            [
                'key' => 'gold',
                'name' => 'PVD Gold Finish',
                'image' => $placeholders['finish_gold'] ?? 'assets/products/finish-gold.png',
                'colorCode' => '#d4af37',
                'description' => 'Physical Vapor Deposition (PVD) titanium gold coating offering extreme scratch resistance.',
                'tag' => 'Royal Luxury'
            ],
            [
                'key' => 'rosegold',
                'name' => 'PVD Rose Gold Finish',
                'image' => $placeholders['finish_rosegold'] ?? 'assets/products/finish-rosegold.png',
                'colorCode' => '#b76e79',
                'description' => 'Warm, romantic PVD rose gold metallic coating tailored for modern luxury architectural suites.',
                'tag' => 'Warm Contemporary'
            ],
            [
                'key' => 'black',
                'name' => 'PVD Black Finish',
                'image' => $placeholders['finish_black'] ?? 'assets/products/finish-black.png',
                'colorCode' => '#212529',
                'description' => 'Deep matte PVD black finish engineered for minimalist and industrial designer interiors.',
                'tag' => 'Architectural Matte'
            ]
        ];

        // 6. Shower Channel Drainer Architectural Series (Catalog specifications)
        $drainerSeries = [
            [
                'code' => 'BH-4101',
                'name' => 'Palo',
                'type' => 'Square Perforated Pattern',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm'
            ],
            [
                'code' => 'BH-4102',
                'name' => 'Wave',
                'type' => 'Flowing S-Curve Perforation',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm'
            ],
            [
                'code' => 'BH-4103',
                'name' => 'Verticle',
                'type' => 'Linear Slotted Pattern',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm'
            ],
            [
                'code' => 'BH-4104',
                'name' => 'Tile / Marble Insert',
                'type' => 'Invisible Seamless Reversible Tray',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm'
            ],
            [
                'code' => 'BH-4105',
                'name' => 'Piano',
                'type' => 'Harmonic Key Pattern',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm'
            ],
            [
                'code' => 'BH-4108',
                'name' => 'Capsule',
                'type' => 'Modern Geometric Capsule Slots',
                'flow' => '40 - 60 Liters / Minute',
                'outlet' => '60 mm center / side',
                'sizes' => '300, 450, 600, 750, 900, 1000, 1200, 1500 mm'
            ]
        ];

        // 7. Manufacturing Process Flow (Direct from catalog page 8)
        $processSteps = [
            [
                'step' => '01',
                'name' => 'Raw Material Selection',
                'icon' => 'bi-shield-check',
                'tag' => 'AISI 304 / 316 Grade',
                'desc' => 'Certified high-tensile stainless steel sheets undergo spectroscopic verification for maximum corrosion resistance and durability.',
                'metric' => '100% Verified Quality'
            ],
            [
                'step' => '02',
                'name' => 'Precision Decoiling & Flattening',
                'icon' => 'bi-gear-wide-connected',
                'tag' => 'Automated Plate Leveling',
                'desc' => 'Hydraulic automated uncoiling and plate flattening eliminating micro-stress for millimeter-accurate base alignment.',
                'metric' => 'Zero Internal Tension'
            ],
            [
                'step' => '03',
                'name' => 'Fiber CNC Laser Cutting',
                'icon' => 'bi-crosshair',
                'tag' => 'Ultra-High Accuracy',
                'desc' => 'High-power fiber laser optics sculpt designer water perforation motifs with clean, burr-free razor precision edges.',
                'metric' => '±0.02 mm Precision'
            ],
            [
                'step' => '04',
                'name' => 'Deep Hydraulic Pressing',
                'icon' => 'bi-box-arrow-in-down',
                'tag' => 'Seamless Flow Slope',
                'desc' => 'Heavy tonnage hydraulic dies form the integrated sloping channel bed, guaranteeing continuous, zero-puddle drainage flow.',
                'metric' => 'Optimal Slope Gradient'
            ],
            [
                'step' => '05',
                'name' => 'Inner Beading & Safety Folding',
                'icon' => 'bi-bounding-box',
                'tag' => 'Barefoot Safe',
                'desc' => 'Edges are uniformly folded inwards and smoothly tapered outwards to ensure complete safety for barefoot users.',
                'metric' => '360° Safety Edge'
            ],
            [
                'step' => '06',
                'name' => 'Robotic Surface Buffing',
                'icon' => 'bi-disc',
                'tag' => 'Micro-Uniform Pre-Polish',
                'desc' => 'Automated abrasive stations eliminate microscopic contours, preparing the alloy surface for flawless architectural finishing.',
                'metric' => 'Uniform Ra Finish'
            ],
            [
                'step' => '07',
                'name' => 'Handcrafted Mirror & Satin Polishing',
                'icon' => 'bi-stars',
                'tag' => 'PVD & Hairline Finish',
                'desc' => 'Master artisans perform multi-stage electro-buffing for jewel-like mirror reflections or architectural satin brushed finishes.',
                'metric' => 'PVD Gold / Matt / Mirror'
            ],
            [
                'step' => '08',
                'name' => '100% Quality & Flow Testing',
                'icon' => 'bi-check-all',
                'tag' => 'Zero Defect Inspection',
                'desc' => 'Individual hydrostatic flow testing, acoustic checking, and strict optical calibration to ensure zero defects.',
                'metric' => '60L/min Flow Certified'
            ],
            [
                'step' => '09',
                'name' => 'Protective Multi-Layer Packaging',
                'icon' => 'bi-box-seam',
                'tag' => 'Scratch Protection',
                'desc' => 'Laser-peel protective film applied with corner cushions, boxed in reinforced master cartons for tamper-proof transit.',
                'metric' => 'Shockproof Foam Packed'
            ],
            [
                'step' => '10',
                'name' => 'Global Distribution & Dispatch',
                'icon' => 'bi-truck',
                'tag' => 'Pan-India & Global Export',
                'desc' => 'Rapid dispatch network serving leading architects, high-end builders, and authorized luxury showrooms worldwide.',
                'metric' => 'Worldwide Logistics'
            ]
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
     * Handle requirement / quote request submission and send email notification.
     */
    public function submitQuote(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'phone'       => 'required|string|max:30',
            'email'       => 'required|email|max:120',
            'description' => 'required|string|max:3000',
        ]);

        $adminEmail = 'rohantechmatrix@gmail.com';

        try {
            Mail::send('emails.quote-inquiry', ['data' => $validated], function ($message) use ($validated, $adminEmail) {
                $message->to($adminEmail, 'Wellnox Inquiries')
                        ->subject('New Customer Requirement: ' . $validated['name'] . ' | Wellnox Lead')
                        ->replyTo($validated['email'], $validated['name']);
            });

            Log::info('Quote inquiry email sent successfully to ' . $adminEmail . ' for: ' . $validated['name']);
        } catch (\Exception $e) {
            Log::error('Failed to send inquiry email: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Thank you for connecting! Your requirement has been emailed and our team will get in touch shortly.'
        ]);
    }
}
