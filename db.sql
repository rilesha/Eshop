-- CREATE DATABASE ecommerce;
-- USE ecommerce;

-- CREATE TABLE users (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(100) NOT NULL,
--     email VARCHAR(100) NOT NULL UNIQUE,
--     password VARCHAR(255) NOT NULL,
--     role ENUM('customer', 'admin') DEFAULT 'customer',
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- CREATE TABLE products (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(150) NOT NULL,
--     description TEXT,
--     price DECIMAL(10,2) NOT NULL,
--     stock INT DEFAULT 0,
--     image VARCHAR(255),
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- );

-- CREATE TABLE orders (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT NOT NULL,
--     product_id INT NOT NULL,
--     quantity INT NOT NULL,
--     total DECIMAL(10,2) NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     FOREIGN KEY (user_id) REFERENCES users(id),
--     FOREIGN KEY (product_id) REFERENCES products(id)
-- );
INSERT INTO products (name, description, price, stock, image, created_at) VALUES
('Real Madrid Home Jersey 2025', 'Official Real Madrid 2025/26 home jersey. Premium quality.', 4500.00, 25, 'real_madrid.png', '2026-07-24 20:53:57'),
('FC Barcelona Home Jersey 2025', 'Authentic Barcelona 2025/26 home jersey. Iconic blaugrana design.', 4500.00, 20, 'barcelona.png', '2026-07-24 20:53:57'),
('Manchester United Home Jersey 2025', 'Official Manchester United 2025/26 home jersey. Classic red design.', 4200.00, 18, 'man_united.png', '2026-07-24 20:53:57'),
('Liverpool FC Home Jersey 2025', 'Authentic Liverpool 2025/26 home jersey. The famous red jersey.', 4200.00, 22, 'liverpool.png', '2026-07-24 20:53:57'),
('Juventus FC Home Jersey 2025', 'Official Juventus 2025/26 home jersey. Timeless black and white.', 4000.00, 15, 'juventus.png', '2026-07-24 20:53:57'),
('Paris Saint-Germain Home Jersey 2025', 'Authentic PSG 2025/26 home jersey. Sleek navy blue design.', 4300.00, 20, 'psg.png', '2026-07-24 20:53:57');

-- Insert Football Boots
INSERT INTO products (name, description, price, stock, image, created_at) VALUES
('Adidas F50 Elite FG', 'Engineered for ultimate speed, lightweight Fibertouch upper with Sprintframe 360 outsole.', 28500.00, 15, 'adidas_f50.png', CURRENT_TIMESTAMP),
('Nike Mercurial Vapor 16 Elite', 'Features a 3/4-length Air Zoom unit and Gripknit upper for incredible touch and explosive acceleration.', 31000.00, 12, 'nike_vapor16.png', CURRENT_TIMESTAMP),
('Puma Future 7 Ultimate', 'FUZIONFIT360 upper with PWRTAPE for custom lock-in and dynamic movement control.', 24000.00, 18, 'puma_future.png', CURRENT_TIMESTAMP),
('Adidas Predator 24 Elite FT', 'Iconic fold-over tongue with Strikeskin rubber fins for precision curve and shooting.', 29500.00, 10, 'adidas_predator24.png', CURRENT_TIMESTAMP),
('Nike Phantom GX II Elite', 'Revolutionary Nike Gripknit texture for pin-point precision passing and shooting.', 29000.00, 14, 'nike_phantom_gx.png', CURRENT_TIMESTAMP),
('Mizuno Morelia Neo IV Beta Japan', 'Handcrafted in Japan with premium K-leather for unmatched touch and lightweight feel.', 34000.00, 8, 'mizuno_morelia.png', CURRENT_TIMESTAMP);
