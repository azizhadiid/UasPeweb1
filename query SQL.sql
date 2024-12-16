CREATE DATABASE uas;

USE uas;

CREATE TABLE processor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    merk VARCHAR(255),
    tipe VARCHAR(255),
    core VARCHAR(255),
    threads VARCHAR(255)
);

INSERT INTO processor (merk, tipe, core, threads) VALUES
('Intel', 'i7-10700K', '8', '16'),
('AMD', 'Ryzen 9 5900X', '12', '24'),
('Intel', 'i5-10400F', '6', '12'),
('AMD', 'Ryzen 5 5600X', '6', '12'),
('Intel', 'i9-10900K', '10', '20'),
('AMD', 'Ryzen 7 5800X', '8', '16'),
('Intel', 'i3-10100', '4', '8'),
('AMD', 'Ryzen 3 3300X', '4', '8'),
('Intel', 'i9-11900K', '8', '16'),
('AMD', 'Ryzen 7 3700X', '8', '16');

