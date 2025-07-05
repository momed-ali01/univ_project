# UDClubs - University Club Management System

A comprehensive web application for managing university clubs and student memberships. This system allows students to browse available clubs, register for memberships, and provides administrators with tools to manage clubs and members.

## 🎯 Project Overview

UDClubs is a full-stack web application designed to streamline university club management. The system provides a user-friendly interface for students to discover and join clubs, while offering administrative tools for club management.

### Key Features

- **Student Registration**: Students can register to join university clubs
- **Club Browsing**: View available clubs and their details
- **Admin Dashboard**: Comprehensive management interface for administrators
- **Member Management**: Add, edit, and delete club members
- **Club Management**: Create, update, and manage club information
- **Responsive Design**: Modern, mobile-friendly interface
- **Security**: Protected against SQL injection and XSS attacks

## 🏗️ System Architecture

### Frontend
- **HTML5**: Semantic markup with responsive design
- **CSS3**: Modern styling with grid and flexbox layouts
- **JavaScript**: Interactive elements and form validation
- **Bootstrap 5**: Admin interface styling
- **SweetAlert2**: Enhanced user notifications

### Backend
- **PHP**: Server-side logic and database operations
- **MySQL**: Database management system
- **Session Management**: Secure admin authentication

### Dependencies
- **jQuery**: DOM manipulation and AJAX requests
- **SweetAlert2**: User-friendly alerts and notifications

## 📁 Project Structure

```
udclubs/
├── css/
│   ├── components/
│   │   ├── header.css
│   │   └── footer.css
│   ├── general.css
│   └── styles.css
├── js/
│   └── script.js
├── img/
│   └── [image assets]
├── index.html              # Landing page
├── about.html              # About page
├── contact.html            # Contact page
├── register.php            # Student registration
├── admin_page.php          # Admin dashboard
├── admin_clubs.php         # Club management
├── admin_add.php           # Add new member
├── admin_update.php        # Update member
├── admin_del.php           # Delete member
├── admin_clubs_add.php     # Add new club
├── admin_clubs_update.php  # Update club
├── admin_clubs_del.php     # Delete club
├── connexion_admin.php     # Admin login
├── deconnexion.php         # Admin logout
├── db_config.php           # Database configuration
├── package.json            # Node.js dependencies
└── UD-Clubs-DB.txt         # Database schema
```

## 🗄️ Database Schema

The system uses a MySQL database with the following tables:

### `clubs` Table
- `id_club` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `nom` (VARCHAR(50)) - Club name
- `details` (VARCHAR(255)) - Club description

### `adherent` Table
- `id_adh` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `nom` (VARCHAR(50)) - Member last name
- `prenom` (VARCHAR(50)) - Member first name
- `email` (VARCHAR(25)) - Member email
- `filiere` (VARCHAR(25)) - Academic field
- `id_club` (INT, FOREIGN KEY) - References clubs.id_club

### `administrateur` Table
- `id_admin` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `nom` (VARCHAR(50)) - Admin name
- `email` (VARCHAR(25)) - Admin email
- `mot_de_passe` (VARCHAR(25)) - Admin password

## 🚀 Installation

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- Node.js (for frontend dependencies)

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone [repository-url]
   cd udclubs
   ```

2. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

3. **Database Setup**
   - Create a MySQL database named `udclubs_db`
   - Import the database schema from `UD-Clubs-DB.txt`
   ```sql
   mysql -u root -p udclubs_db < UD-Clubs-DB.txt
   ```

4. **Configure Database Connection**
   - Update `db_config.php` with your database credentials:
   ```php
   $conn = mysqli_connect('localhost', 'username', 'password', 'udclubs_db');
   ```

5. **Web Server Configuration**
   - Place the project files in your web server's document root
   - Ensure PHP is properly configured
   - Set appropriate file permissions

6. **Access the Application**
   - Open your browser and navigate to the project URL
   - Default admin credentials are available in the database

## 📱 Usage Guide

### For Students

1. **Browse Clubs**: Visit the home page to see available clubs
2. **Learn More**: Check the About page for club benefits and details
3. **Register**: Click "Register" to join a club
4. **Fill Form**: Complete the registration form with your details
5. **Select Club**: Choose from available clubs in the dropdown
6. **Submit**: Complete your registration

### For Administrators

1. **Login**: Click "Connexion" and enter admin credentials
2. **Dashboard**: Access the admin dashboard to manage members
3. **View Members**: See all registered club members
4. **Add Members**: Create new member entries
5. **Edit Members**: Update existing member information
6. **Delete Members**: Remove members from the system
7. **Manage Clubs**: Switch to club management to add/edit clubs

## 🔧 Configuration

### Database Configuration
The database connection is configured in `db_config.php`:
```php
$conn = mysqli_connect('localhost', 'root', '', 'udclubs_db');
```

### Default Admin Accounts
- **Email**: momed@gmail.com, **Password**: momed
- **Email**: soma@gmail.com, **Password**: somasam

### Available Clubs
The system comes with pre-configured clubs:
- Club de Théâtre
- Club de Débat
- Club de Jeu d'échecs
- Club de Culturel
- Club IT

## 🔒 Security Features

### Implemented Security Measures
- **SQL Injection Protection**: All database queries use prepared statements
- **XSS Prevention**: User input is sanitized using `htmlspecialchars()`
- **Session Management**: Secure admin authentication with session control
- **Input Validation**: Client-side and server-side validation

### Security Recommendations
- Change default admin passwords
- Implement password hashing for admin accounts
- Add CSRF protection to forms
- Set up HTTPS for production deployment
- Implement rate limiting for login attempts

## 🐛 Bug Fixes

This project has undergone security improvements. See `BUGS_FIXED_REPORT.md` for details on resolved issues:
- Fixed SQL injection vulnerabilities
- Resolved XSS security issues
- Improved JavaScript error handling

## 🎨 Design Features

### User Interface
- Modern, responsive design
- Clean typography using Rubik font family
- Intuitive navigation
- Mobile-friendly layout
- Consistent color scheme

### User Experience
- SweetAlert2 for enhanced notifications
- Smooth transitions and interactions
- Form validation with user feedback
- Accessible design principles

## 📊 Features by Page

### Home Page (`index.html`)
- Hero section with call-to-action
- Navigation to other pages
- Admin login modal
- Responsive layout

### About Page (`about.html`)
- Detailed information about university clubs
- Benefits of joining clubs
- Club-specific advantages
- Table of contents navigation

### Contact Page (`contact.html`)
- Contact form for user inquiries
- University contact information
- Location details
- Professional layout

### Registration Page (`register.php`)
- Student registration form
- Dynamic club selection
- Form validation
- Success/error notifications

### Admin Dashboard (`admin_page.php`)
- Member management interface
- Table view of all members
- Add, edit, delete operations
- Bootstrap styling

## 🚀 Deployment

### Production Deployment
1. Upload files to web server
2. Configure database connection
3. Set up SSL certificate
4. Configure web server settings
5. Test all functionality

### Environment Variables
Consider using environment variables for:
- Database credentials
- Admin passwords
- Email configurations
- Security keys

## 🤝 Contributing

### Development Guidelines
- Follow PSR coding standards for PHP
- Use semantic HTML
- Write clean, commented code
- Test security features
- Maintain responsive design

### Bug Reports
Submit bug reports including:
- Description of the issue
- Steps to reproduce
- Expected vs actual behavior
- Browser/environment details

## 📄 License

This project is licensed under the ISC License.

## 👥 Authors

- **Mohamed Ali** - [demahomali01@gmail.com](mailto:demahomali01@gmail.com)
- **Mohamed Moumine** - [mohamedsoma876@gmail.com](mailto:mohamedsoma876@gmail.com)

## 📞 Support

For questions or support:
- **Email**: udclub@univ.edu.dj
- **Phone**: +253 77362040
- **Address**: Rue de Venise, Djibouti, Djibouti, n°45493

## 🔮 Future Enhancements

Potential improvements:
- Email notifications for registrations
- Student dashboard
- Club event management
- Advanced search and filtering
- Multi-language support
- Mobile app development
- Advanced reporting features

---

*Made with 🧡 by the UDClubs development team*