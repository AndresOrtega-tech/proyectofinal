# Social Network for Collaborative Projects

<p align="center">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

## About The Project

This platform is a specialized social network designed to connect people with project ideas to collaborators with the skills needed to bring those ideas to life. Whether you're a developer looking for a designer, an entrepreneur seeking a technical co-founder, or a creative professional looking for collaborative opportunities, this platform helps you find the perfect match for your project needs.

The application allows users to create profiles, post project ideas, search for collaborators based on skills and interests, communicate through an integrated messaging system, and collaborate effectively through shared project spaces.

## Features

- **User Management**: Create and customize profiles with skills, experience, and areas of interest
- **Project Creation**: Post detailed project ideas with requirements and collaboration needs
- **Team Building**: Search for and invite collaborators based on skills and interests
- **Messaging System**: Communicate with potential collaborators through private messages
- **Notifications**: Receive real-time updates on project activities and messages
- **Project Dashboard**: Manage project progress, tasks, and team members
- **Skill Matching**: Smart algorithms to match project needs with user skills
- **Social Interactions**: Follow users, like projects, and build a professional network
- **Resource Sharing**: Share files, links, and resources related to projects

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL 5.7+ or MariaDB 10.3+
- Node.js and NPM
- Git
- Web server (Apache, Nginx)

## Installation

1. **Clone the repository**
```bash
git clone https://github.com/yourusername/redSocialProyectos.git
cd redSocialProyectos
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install JavaScript dependencies**
```bash
npm install
```

4. **Set up environment variables**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure your database in the .env file**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. **Run migrations and seeders**
```bash
php artisan migrate --seed
```

7. **Compile assets**
```bash
npm run dev
```

8. **Start the development server**
```bash
php artisan serve
```

9. **Access the application**
Visit `http://localhost:8000` in your web browser

## Usage

### Creating a Profile
- Register for an account
- Complete your profile with skills, experience, and interests
- Upload a profile picture and add a bio

### Posting a Project
- Click on "Create Project" in the dashboard
- Fill in project details, including title, description, and requirements
- Specify the skills needed for collaboration
- Set project timeline and goals

### Finding Collaborators
- Use the search function to find users with specific skills
- Browse through recommended collaborators based on your project needs
- Send collaboration invitations to potential team members

### Managing Projects
- Track project progress through the dashboard
- Assign tasks to team members
- Share resources and files related to the project
- Communicate with team members through the messaging system

## Technology Stack

- **Backend**: Laravel 10 (PHP Framework)
- **Frontend**: Blade templates, JavaScript, CSS
- **Database**: MySQL/MariaDB
- **Authentication**: Laravel Fortify
- **Real-time Features**: Laravel Echo, Pusher
- **File Storage**: Laravel Storage with S3 compatibility
- **Task Queue**: Laravel Horizon

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the project
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgments

- [Laravel](https://laravel.com) - The PHP framework used
- [Bootstrap](https://getbootstrap.com) - Frontend component library
- [FontAwesome](https://fontawesome.com) - Icons used throughout the application
- All contributors who participate in this project
