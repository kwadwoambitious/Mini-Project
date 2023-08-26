-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2023 at 01:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(16000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'HTML AND CSS', 'HTML (Hypertext Markup Language) is the structure of web pages, using tags to define content like headings, paragraphs, images, and links. CSS (Cascading Style Sheets) works with HTML to control presentation, such as colors, fonts, and layout. These essential web technologies combine to create visually appealing and well-structured websites, providing a seamless user experience and allowing developers to design engaging interfaces.'),
(2, 'JAVASCRIPT', 'JavaScript is a versatile, client-side programming language used in web development to add interactivity and dynamic elements to websites. It enables developers to manipulate page content, handle events, and create animations directly in web browsers. With the support of Node.js, JavaScript can also be used for server-side development, making it a crucial tool for building interactive and user-friendly web applications.'),
(3, 'BOOTSTRAP', 'Bootstrap is a widely-used front-end framework that simplifies web development. Developed by Twitter, it offers pre-designed HTML, CSS, and JavaScript components, including a responsive grid system, buttons, forms, and more. By providing a solid foundation of ready-to-use elements, Bootstrap enables developers to create visually appealing, mobile-friendly websites quickly and efficiently.'),
(4, 'PHP', 'PHP (Hypertext Preprocessor) is a popular server-side scripting language for web development. It is embedded within HTML and executed on the web server, generating dynamic content and interacting with databases. PHP\'s versatility, ease of use, and extensive community support have made it a go-to choice for building dynamic websites, web applications, and server-side functionalities that power a significant portion of the internet.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `category_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_message` text DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `post_creator` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`category_id`, `id`, `post_title`, `post_message`, `post_date`, `post_creator`) VALUES
(1, 3, 'HTML Forms: Creating User Input Elements', 'HTML forms are a crucial part of interactive web pages, enabling users to input data that can be submitted to a server. Learn how to create form elements such as text inputs, radio buttons, checkboxes, and more', '2023-08-25', 'amadankwaa'),
(1, 4, 'Semantic HTML: Enhancing Accessibility and SEO', 'Semantic HTML goes beyond just structuring content—it adds meaning to the elements on a web page. Discover the importance of using semantic tags like header, nav, section, and how they benefit accessibility and search engine optimization (SEO)', '2023-08-26', 'antwiebenezer'),
(1, 5, 'HTML Forms: Creating User Input Elements', 'HTML forms are a crucial part of interactive web pages, enabling users to input data that can be submitted to a server. Learn how to create form elements such as text inputs, radio buttons, checkboxes, and more', '2023-08-25', 'amadankwaa'),
(1, 6, 'Semantic HTML: Enhancing Accessibility and SEO', 'Semantic HTML goes beyond just structuring content—it adds meaning to the elements on a web page. Discover the importance of using semantic tags like header, nav, section.', '2023-08-26', 'antwiebenezer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` text NOT NULL,
  `c_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `pass`, `c_pass`) VALUES
(1, 'Kwadwo', 'Antwi', 'kwadwoantwi', 'kwadwoantwi@gmail.com', 'kwadwoantwi', 'kwadwoantwi'),
(2, 'Fedilia', 'Dankwaa', 'amadankwaa', 'dankwaafedilia@gmail.com', '$2y$10$ywq0IB1Azfv.267anEJ2L.BiQ1WAoWmOvW.f2OpnBX9o/MhODhbn6', '$2y$10$ywq0IB1Azfv.267anEJ2L.BiQ1WAoWmOvW.f2OpnBX9o/MhODhbn6'),
(3, 'Ebenezer', 'Antwi', 'kwadwoambitious', 'antwiebenezer784@gmail.com', 'kwadwoambitious', 'kwadwoambitious'),
(4, 'Elizabeth', 'Adjei', 'adjeielizabeth', 'elizabethadjei@gmail.com', '$2y$10$29Oyb5knrVnRJmHw8.6M4uuRQF9DgLwVu8mKETp8PhK2VrUU.63z6', '$2y$10$29Oyb5knrVnRJmHw8.6M4uuRQF9DgLwVu8mKETp8PhK2VrUU.63z6'),
(5, 'Brago', 'Hagar', 'bragohagar', 'bragohagar@gmail.com', '$2y$10$Yhsp7/evPyOMwXG8.hXfbe9A4JdhlqdZgf4g3C7u9OUZxLX7aWlhC', '$2y$10$uqyL7vS0C04PuUMV058gfulfasp5Uv7dSyaOlW3JDKvvHDslt3X2S'),
(6, 'Kwadwo', 'Asamoah', 'kwadwoasamoah', 'kwadwoasamoah@gmail.com', '$2y$10$t6VJYrGN2a4t22BIt1QQ7./XBu7FC39aceEtdPvjBnvnENUckRgGa', '$2y$10$6OeAWMP2h8RZz3t9ovnhXOE5zGQsKlyG3nJ0TX6swMwUcSfgqRc/y'),
(7, 'Kwaku', 'Kaih', 'kwakukaih', 'kwakukaih@gmail.com', '$2y$10$mzYM3egjtgBZ1lon4JeXQuoxo25yzX0/LW0xU9AOEdri.1wKq8SsW', '$2y$10$mzYM3egjtgBZ1lon4JeXQuoxo25yzX0/LW0xU9AOEdri.1wKq8SsW'),
(8, 'Ernestina', 'Anane', 'ananernestina', 'antwiebenezer824@gmail.com', '$2y$10$S/2tosUALHtJbmtIX5H8/.7hkUsg4qWHNPg/zHyjg.IYfUSjCobdq', '$2y$10$9JdJbqqARIGZ7dhzZoYXe.uPaUbQLqUics3RqYz3RrxQnLkqXylnC'),
(9, 'Godfred', 'Adams', 'adamsgodfred', 'adamsgodfred3@gmail.com', '$2y$10$W28iWf.UWeZ4ntJ6VzVsXudWqKGepDhwZb6j0PsIP71x72rr2bGG.', '$2y$10$0kaOMJYxXUWoNa32d4OuW.XY6zCGSabQb7H4z0of3T2Fm5QYukemG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
