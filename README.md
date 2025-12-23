# Modern PHP Mechanical Industry Website

A complete, modern website solution for mechanical/precision machining industry built with PHP, Bootstrap 5, and MySQL.

## Features

### Frontend Features

- **Responsive Design**: Mobile-first, modern design with Bootstrap 5
- **Professional UI**: Clean, industry-appropriate design with smooth animations
- **SEO Optimized**: Proper meta tags, structured data, and clean URLs
- **Modern Components**: Hero sections, service cards, product galleries, contact forms
- **Interactive Elements**: Image lightbox, smooth scrolling, contact forms with validation
- **Performance Optimized**: Minified CSS/JS, optimized images, fast loading times

### Admin Panel Features

- **Secure Authentication**: Login/logout with session management
- **Dashboard**: Overview of website statistics and recent activities
- **Product Management**: Full CRUD operations for products with image upload
- **Category Management**: Organize products into categories
- **Services Management**: Manage company services and offerings
- **Industries Management**: Showcase industries you serve
- **Gallery Management**: Upload and organize company/product images
- **Settings Management**: Update company information and website settings
- **Responsive Design**: Mobile-friendly admin interface

### Technical Features

- **Modern PHP**: Object-oriented PHP with PDO for database operations
- **Security**: Input sanitization, CSRF protection, SQL injection prevention
- **Database**: Well-structured MySQL database with proper relationships
- **File Upload**: Secure image upload with validation and optimization
- **Form Validation**: Both client-side and server-side validation
- **Error Handling**: Proper error logging and user-friendly error messages
- **Email Integration**: Contact form with email notifications

## Installation

### Prerequisites

- XAMPP (Apache, MySQL, PHP 7.4+)
- Web browser
- Basic PHP knowledge for customization

### Setup Instructions

1. **Install XAMPP** (if not already installed)

   - Download from [https://www.apachefriends.org/](https://www.apachefriends.org/)
   - Install and start Apache and MySQL services

2. **Clone/Copy Project**

   ```bash
   # Copy the project to your XAMPP htdocs directory
   # Example: C:\xampp\htdocs\yogesh-website\
   ```

3. **Database Setup**

   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `mechanical_industry`
   - Import the SQL file: `database/schema.sql`
   - Or run the SQL commands from the schema file

4. **Configuration**

   - Edit `config/database.php` if needed (default settings work with XAMPP)
   - Update company information in the database settings table

5. **File Permissions**

   - Ensure `assets/uploads/` directory is writable
   - Create the uploads directory if it doesn't exist

6. **Access the Website**
   - Frontend: `http://localhost/yogesh-website/`
   - Admin Panel: `http://localhost/yogesh-website/admin/`
   - Default admin credentials: `admin` / `admin123`

## Project Structure

```
yogesh-website/
├── admin/                  # Admin panel
│   ├── css/               # Admin stylesheets
│   ├── js/                # Admin JavaScript
│   ├── includes/          # Admin includes (header, sidebar)
│   ├── dashboard.php      # Admin dashboard
│   ├── login.php          # Admin login
│   ├── products.php       # Product management
│   ├── categories.php     # Category management
│   └── ...
├── assets/                # Public assets
│   ├── css/              # Stylesheets
│   ├── js/               # JavaScript files
│   ├── images/           # Static images
│   └── uploads/          # User uploaded files
├── config/               # Configuration files
│   └── database.php      # Database connection
├── includes/             # Shared includes
│   ├── functions.php     # Common functions
│   ├── header.php        # Site header
│   └── footer.php        # Site footer
├── database/             # Database files
│   └── schema.sql        # Database structure
├── index.php             # Homepage
├── about.php             # About page
├── contact.php           # Contact page
├── products.php          # Products listing
├── services.php          # Services page
└── process-contact.php   # Contact form handler
```

## Customization

### Company Information

1. Log into admin panel
2. Go to Settings
3. Update company details, contact information, and about text

### Design Customization

- Edit `assets/css/style.css` for frontend styles
- Edit `admin/css/admin.css` for admin panel styles
- Modify colors by updating CSS custom properties (`:root` section)

### Adding New Pages

1. Create new PHP file in root directory
2. Include header and footer
3. Add navigation link in `includes/header.php`

### Database Customization

- Add new tables as needed
- Update the database schema
- Modify functions in `includes/functions.php`

## Technologies Used

### Frontend

- **HTML5/CSS3**: Semantic markup and modern styling
- **Bootstrap 5**: Responsive framework
- **JavaScript ES6+**: Modern JavaScript with features like async/await
- **Font Awesome 6**: Icon library
- **AOS Library**: Scroll animations
- **Google Fonts**: Custom typography

### Backend

- **PHP 7.4+**: Server-side logic
- **MySQL**: Database management
- **PDO**: Database abstraction layer
- **Session Management**: User authentication

### Development Tools

- **Modern CSS**: Custom properties, flexbox, grid
- **Responsive Design**: Mobile-first approach
- **Performance Optimization**: Minified assets, optimized images
- **SEO Best Practices**: Meta tags, structured data

## Security Features

- **Input Validation**: All user inputs are validated and sanitized
- **SQL Injection Prevention**: Using PDO prepared statements
- **XSS Protection**: Output escaping with htmlspecialchars()
- **Session Security**: Secure session handling
- **File Upload Security**: File type and size validation
- **Error Handling**: Proper error logging without exposing sensitive information

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance Features

- **Optimized Images**: Automatic image compression
- **Minified Assets**: Compressed CSS and JavaScript
- **Efficient Database Queries**: Optimized SQL queries
- **Caching Headers**: Proper cache control headers
- **Lazy Loading**: Images load as needed

## Support

For support and customization:

- Check the code comments for implementation details
- Review the database schema for understanding data structure
- Modify the CSS custom properties for easy theme changes
- Use the admin panel for content management

## Demo Credentials

**Admin Panel Access:**

- URL: `http://localhost/yogesh-website/admin/`
- Username: `admin`
- Password: `admin123`

**Database:**

- Host: `localhost`
- Username: `root`
- Password: (empty)
- Database: `mechanical_industry`

## License

This project is created for educational and commercial use. Feel free to modify and adapt it for your business needs.

---

**Built with ❤️ for the Mechanical Industry**
