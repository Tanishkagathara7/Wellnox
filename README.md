# WELLNOX - High-End Luxury Clone

This project is a high-end, pixel-precise Laravel clone of the **Wellnox International** design reference.

---

## 🚀 Live Access

The project server is running locally at:
👉 **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 🛠️ How to Run Manually

Whenever you want to start the server:

1. Open a PowerShell terminal in the project directory:
   ```powershell
   cd c:\xampp\htdocs\wellnox
   ```

2. Add PHP to your session PATH if needed and start the artisan server:
   ```powershell
   $env:Path = "C:\xampp\php;" + $env:Path
   php artisan serve --port=8000
   ```

3. Open **http://127.0.0.1:8000** in your web browser.

---

## 📁 Architecture & Components

- **Routes**: [`routes/web.php`](file:///c:/xampp/htdocs/wellnox/routes/web.php)
  - `/` &rarr; [`HomeController@index`](file:///c:/xampp/htdocs/wellnox/app/Http/Controllers/HomeController.php)
  - `/download-catalogue` &rarr; Downloads official catalog PDF
- **Layout**: [`resources/views/layouts/app.blade.php`](file:///c:/xampp/htdocs/wellnox/resources/views/layouts/app.blade.php)
- **Home View**: [`resources/views/home.blade.php`](file:///c:/xampp/htdocs/wellnox/resources/views/home.blade.php)
- **Components**:
  - Navbar: [`resources/views/components/navbar.blade.php`](file:///c:/xampp/htdocs/wellnox/resources/views/components/navbar.blade.php)
  - Hero Section: [`resources/views/components/hero.blade.php`](file:///c:/xampp/htdocs/wellnox/resources/views/components/hero.blade.php)
  - Category Card: [`resources/views/components/category-card.blade.php`](file:///c:/xampp/htdocs/wellnox/resources/views/components/category-card.blade.php)
  - Product Card: [`resources/views/components/product-card.blade.php`](file:///c:/xampp/htdocs/wellnox/resources/views/components/product-card.blade.php)
  - Feature Card: [`resources/views/components/feature-card.blade.php`](file:///c:/xampp/htdocs/wellnox/resources/views/components/feature-card.blade.php)
  - Section Title: [`resources/views/components/section-title.blade.php`](file:///c:/xampp/htdocs/wellnox/resources/views/components/section-title.blade.php)
  - Footer: [`resources/views/components/footer.blade.php`](file:///c:/xampp/htdocs/wellnox/resources/views/components/footer.blade.php)
- **Styles & Scripts**:
  - CSS: [`public/assets/css/wellnox.css`](file:///c:/xampp/htdocs/wellnox/public/assets/css/wellnox.css)
  - JS: [`public/assets/js/wellnox.js`](file:///c:/xampp/htdocs/wellnox/public/assets/js/wellnox.js)
  - Assets & Images: `public/assets/images/`, `public/assets/products/`, `public/assets/logo/`, `public/assets/catalogue/`
