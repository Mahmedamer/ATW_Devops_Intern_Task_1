# LAMP Stack Setup with Ansible

This Ansible playbook automates the setup of a LAMP (Linux, Apache, MySQL, PHP) stack on Ubuntu servers. It installs Apache, MySQL, and PHP, configures Apache to serve a simple website, sets up a MySQL database and user, and deploys a PHP file with database connection details.

## Requirements

- Ansible installed on your local machine.
- Target servers running Ubuntu (tested on Ubuntu 22.04).
- yml file with MySQL credentials (`mysql_root_password`, `mysql_db_name`, `mysql_user`, `mysql_password`) stored in the group_vars folder.

## Instructions

1. Clone this repository to your local machine:

```bash
git clone https://github.com/your/repository.git
```

2. Navigate to the repository directory:

```bash
cd repository
```

3. Create a yml file in the group_vars directory with your MySQL credentials:

```yml
---
mysql_root_password=root_password
mysql_db_name=your_database
mysql_user=your_user
mysql_password=your_password
```
4. Update the setup_lamp_website.yml playbook file if necessary, providing the correct path to your .env file.

5. Update your Ansible inventory file (your_inventory_file) with the IP addresses or hostnames of your target servers.

6. Run the Ansible playbook with the following command:

```bash
ansible-playbook -i your_inventory_file setup_lamp_website.yml
```

7. After the playbook completes, your LAMP stack will be set up, and a simple website will be deployed. You can access the website at `http://your_server/`.

## Playbook Structure

### Tasks

#### Apache Role (`roles/apache`)
- Installs Apache web server (`apache2` package).
- Deploys a simple HTML file (`index.html`) to `/var/www/html/index.html`.
- Starts and enables Apache service.

#### MySQL Role (`roles/mysql`)
- Installs MySQL server (`mysql-server` package).
- Sets MySQL root password if not already set.
- Removes anonymous users
- Removes test database.
- Creates a MySQL database and user.

#### PHP Role (`roles/php`)
- Installs PHP and required modules (`php`, `libapache2-mod-php`, `php-mysql` packages).

#### Website Role (`roles/website`)
- Deploys a simple HTML file (`index.php`) to `/var/www/html/index.php`.
- Deploys a PHP file (`db.php`) with database connection details to `/var/www/html/db.php`.
- Sets correct permissions for `/var/www/html` directory.
- Restarts Apache service.

### What Does It Do?

- Installs Apache, MySQL, and PHP on the target servers.
- Configures Apache to serve a simple website.
- Sets up a MySQL database and user.
- Deploys a PHP file (`db.php`) with database connection details.
- Restarts Apache for the changes to take effect.
