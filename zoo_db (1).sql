-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 16, 2024 at 01:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `species` varchar(100) NOT NULL,
  `diet` varchar(50) DEFAULT NULL,
  `lifespan` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `species`, `diet`, `lifespan`, `description`) VALUES
(1, 'Lion', 'Panthera leo', 'Carnivore', 12, 'Lions are large felines that live in Africa.'),
(2, 'Elephant', 'Loxodonta africana', 'Herbivore', 60, 'Elephants are the largest land animals on Earth.'),
(3, 'Tiger', 'Panthera tigris', 'Carnivore', 15, 'Tigers are the largest species of the cat family.'),
(4, 'Giraffe', 'Giraffa camelopardalis', 'Herbivore', 25, 'Giraffes are the tallest mammals on Earth.'),
(5, 'Zebra', 'Equus quagga', 'Herbivore', 20, 'Zebras are African equids with distinctive black-and-white striped coats.'),
(6, 'Panda', 'Ailuropoda melanoleuca', 'Herbivore', 20, 'Pandas are native to south-central China and known for their black-and-white fur.'),
(7, 'Kangaroo', 'Macropus', 'Herbivore', 20, 'Kangaroos are marsupials from Australia.'),
(8, 'Penguin', 'Aptenodytes forsteri', 'Carnivore', 20, 'Penguins are a group of aquatic flightless birds.'),
(9, 'Koala', 'Phascolarctos cinereus', 'Herbivore', 13, 'Koalas are arboreal herbivorous marsupials native to Australia.'),
(10, 'Hippopotamus', 'Hippopotamus amphibius', 'Herbivore', 45, 'Hippopotamuses are large, mostly herbivorous, semi-mammals.'),
(11, 'Rhino', 'Rhinocerotidae', 'Herbivore', 40, 'Rhinoceroses are large, herbivorous mammals identified by their characteristic horned snouts.'),
(12, 'Cheetah', 'Acinonyx jubatus', 'Carnivore', 12, 'Cheetahs are known for their incredible speed.'),
(13, 'Leopard', 'Panthera pardus', 'Carnivore', 17, 'Leopards are graceful and powerful big cats.'),
(14, 'Jaguar', 'Panthera onca', 'Carnivore', 15, 'Jaguars are the largest big cats in the Americas.'),
(15, 'Orangutan', 'Pongo', 'Omnivore', 40, 'Orangutans are great apes native to Indonesia and Malaysia.'),
(16, 'Chimpanzee', 'Pan troglodytes', 'Omnivore', 50, 'Chimpanzees are great apes native to the forests and savannahs of tropical Africa.'),
(17, 'Gorilla', 'Gorilla beringei', 'Herbivore', 35, 'Gorillas are ground-dwelling herbivores that inhabit the forests of central Sub-Saharan Africa.'),
(18, 'Baboon', 'Papio', 'Omnivore', 30, 'Baboons are large, non-hominid primates.'),
(19, 'Crocodile', 'Crocodylidae', 'Carnivore', 70, 'Crocodiles are large aquatic reptiles.'),
(20, 'Alligator', 'Alligator mississippiensis', 'Carnivore', 50, 'Alligators are large crocodilians in the genus Alligator.'),
(21, 'Polar Bear', 'Ursus maritimus', 'Carnivore', 25, 'Polar bears are native to the Arctic region.'),
(22, 'Grizzly Bear', 'Ursus arctos horribilis', 'Omnivore', 25, 'Grizzly bears are large brown bears.'),
(23, 'Sloth', 'Folivora', 'Herbivore', 20, 'Sloths are known for their slow movement.'),
(24, 'Anteater', 'Vermilingua', 'Carnivore', 14, 'Anteaters are known for their long snouts and tongues.'),
(25, 'Armadillo', 'Dasypodidae', 'Omnivore', 15, 'Armadillos are known for their armored shells.'),
(26, 'Bison', 'Bison bison', 'Herbivore', 20, 'Bison are large herbivores native to North America.'),
(27, 'Buffalo', 'Syncerus caffer', 'Herbivore', 25, 'Buffaloes are large bovines found in Africa and Asia.'),
(28, 'Moose', 'Alces alces', 'Herbivore', 20, 'Moose are the largest members of the deer family.'),
(29, 'Deer', 'Cervidae', 'Herbivore', 15, 'Deer are ruminant mammals found all over the world.'),
(30, 'Wolf', 'Canis lupus', 'Carnivore', 16, 'Wolves are large canines found in the wild.'),
(31, 'Fox', 'Vulpes vulpes', 'Omnivore', 10, 'Foxes are small to medium-sized omnivorous mammals.'),
(32, 'Coyote', 'Canis latrans', 'Omnivore', 14, 'Coyotes are canines native to North America.'),
(33, 'Raccoon', 'Procyon lotor', 'Omnivore', 5, 'Raccoons are medium-sized mammals native to North America.'),
(34, 'Skunk', 'Mephitidae', 'Omnivore', 7, 'Skunks are known for their ability to spray a foul-smelling liquid.'),
(35, 'Otter', 'Lutrinae', 'Carnivore', 12, 'Otters are aquatic or marine carnivorous mammals.'),
(36, 'Seal', 'Pinnipedia', 'Carnivore', 30, 'Seals are pinnipeds typically found in cold waters.'),
(37, 'Sea Lion', 'Otariinae', 'Carnivore', 20, 'Sea lions are marine mammals characterized by external ear flaps.'),
(38, 'Walrus', 'Odobenus rosmarus', 'Carnivore', 40, 'Walruses are large flippered marine mammals.'),
(39, 'Dolphin', 'Delphinidae', 'Carnivore', 40, 'Dolphins are highly intelligent marine mammals.'),
(40, 'Shark', 'Selachimorpha', 'Carnivore', 30, 'Sharks are a group of elasmobranch fish characterized by a cartilaginous skeleton.'),
(41, 'Whale', 'Cetacea', 'Carnivore', 70, 'Whales are a widely distributed and diverse group of fully aquatic placental marine mammals.'),
(42, 'Octopus', 'Octopoda', 'Carnivore', 5, 'Octopuses are soft-bodied, eight-limbed mollusks.'),
(43, 'Jellyfish', 'Scyphozoa', 'Carnivore', 1, 'Jellyfish are soft-bodied, free-swimming aquatic animals with a gelatinous umbrella-shaped bell.'),
(44, 'Starfish', 'Asteroidea', 'Carnivore', 10, 'Starfish or sea stars are star-shaped echinoderms.'),
(45, 'Seahorse', 'Hippocampus', 'Carnivore', 5, 'Seahorses are small marine fish with a horse-like head.'),
(46, 'Flamingo', 'Phoenicopteridae', 'Omnivore', 30, 'Flamingos are known for their pink feathers and long legs.'),
(47, 'Peacock', 'Pavo cristatus', 'Omnivore', 15, 'Peacocks are known for their colorful plumage.'),
(48, 'Ostrich', 'Struthio camelus', 'Omnivore', 40, 'Ostriches are large flightless birds native to Africa.'),
(49, 'Eagle', 'Aquila', 'Carnivore', 20, 'Eagles are large birds of prey.'),
(50, 'Parrot', 'Psittaciformes', 'Omnivore', 50, 'Parrots are colorful birds known for their ability to mimic sounds.');

-- --------------------------------------------------------

--
-- Table structure for table `animal_habitat_relations`
--

CREATE TABLE `animal_habitat_relations` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) DEFAULT NULL,
  `habitat_id` int(11) DEFAULT NULL,
  `zoo_location_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal_habitat_relations`
--

INSERT INTO `animal_habitat_relations` (`id`, `animal_id`, `habitat_id`, `zoo_location_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 3, 1, 1),
(4, 4, 1, 2),
(5, 5, 1, 2),
(6, 6, 2, 3),
(7, 7, 2, 4),
(8, 8, 2, 6),
(9, 9, 2, 3),
(10, 10, 5, 4),
(11, 11, 1, 2),
(12, 12, 1, 1),
(13, 13, 2, 1),
(14, 14, 2, 1),
(15, 15, 2, 3),
(16, 16, 2, 3),
(17, 17, 2, 3),
(18, 18, 2, 3),
(19, 19, 5, 4),
(20, 20, 5, 4),
(21, 21, 4, 6),
(22, 22, 4, 7),
(23, 23, 2, 3),
(24, 24, 2, 3),
(25, 25, 1, 2),
(26, 26, 1, 2),
(27, 27, 1, 2),
(28, 28, 1, 2),
(29, 29, 1, 2),
(30, 30, 1, 1),
(31, 31, 1, 1),
(32, 32, 1, 1),
(33, 33, 1, 1),
(34, 34, 1, 1),
(35, 35, 5, 5),
(36, 36, 5, 5),
(37, 37, 5, 5),
(38, 38, 5, 5),
(39, 39, 6, 5),
(40, 40, 6, 5),
(41, 41, 6, 5),
(42, 42, 6, 5),
(43, 43, 6, 5),
(44, 44, 6, 5),
(45, 45, 6, 5),
(46, 46, 7, 7),
(47, 47, 7, 7),
(48, 48, 7, 7),
(49, 49, 7, 7),
(50, 50, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `visitor_username` varchar(50) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `visitor_username`, `service_id`, `booking_date`, `status`) VALUES
(1, 'visitor1', 1, '2024-06-27', 'Confirmed'),
(2, 'visitor2', 3, '2024-06-28', 'Pending'),
(3, 'visitor3', 4, '2024-06-29', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `habitats`
--

CREATE TABLE `habitats` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `climate` varchar(50) DEFAULT NULL,
  `vegetation` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `habitats`
--

INSERT INTO `habitats` (`id`, `name`, `climate`, `vegetation`, `description`) VALUES
(1, 'Savannah', 'Tropical', 'Grasses, sparse trees', 'The savannah is a grassland ecosystem with tropical climate.'),
(2, 'Rainforest', 'Tropical', 'Dense forest', 'Rainforests are known for their dense vegetation and high rainfall.'),
(3, 'Desert', 'Arid', 'Sparse vegetation', 'Deserts are dry, barren areas of land.'),
(4, 'Tundra', 'Cold', 'Mosses, lichens', 'Tundras are cold, treeless regions.'),
(5, 'Wetlands', 'Humid', 'Marshes, swamps', 'Wetlands are areas where water covers the soil.'),
(6, 'Ocean', 'Marine', 'Coral reefs, kelp forests', 'Oceans cover the majority of the Earth\'s surface.'),
(7, 'Grassland', 'Temperate', 'Grasses', 'Grasslands are areas dominated by grasses.'),
(8, 'Temperate Forest', 'Temperate', 'Deciduous trees', 'Temperate forests have moderate temperatures and diverse vegetation.');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `availability_schedule` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `name`, `description`, `price`, `availability_schedule`) VALUES
(1, 1, 'Safari Grill', 'An African-themed restaurant offering a variety of grilled dishes.', 20.00, '10:00 AM - 8:00 PM'),
(2, 1, 'Rainforest Cafe', 'Enjoy a meal surrounded by lush greenery and exotic animals.', 25.00, '9:00 AM - 9:00 PM'),
(3, 2, 'Zoo Train Tour', 'A guided train tour through the zoo, covering all major attractions.', 15.00, 'Every hour from 10:00 AM to 5:00 PM'),
(4, 3, 'Bird Show', 'An interactive show featuring a variety of exotic birds.', 10.00, '11:00 AM, 1:00 PM, 3:00 PM'),
(5, 3, 'Seal Show', 'Watch seals perform amazing tricks and learn about their behavior.', 12.00, '12:00 PM, 2:00 PM, 4:00 PM'),
(6, 4, 'Gift Shop', 'A shop offering a variety of zoo-themed souvenirs.', 0.00, '9:00 AM - 7:00 PM'),
(7, 5, 'Savannah Adventure Tour', 'Explore the African savannah with an expert guide.', 30.00, '10:00 AM, 12:00 PM, 2:00 PM'),
(8, 5, 'Rainforest Expedition Tour', 'Discover the secrets of the rainforest and its inhabitants.', 25.00, '11:00 AM, 1:00 PM, 3:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`) VALUES
(1, 'Restaurant'),
(2, 'Train Tour'),
(3, 'Animal Show'),
(4, 'Gift Shop'),
(5, 'Guided Tour');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `role_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `age`, `name`, `lastname`, `role_type`) VALUES
('u_00001', 'admin', 'adminpass', 45, 'Alice', 'Johnson', 'admin'),
('u_00002', 'employee1', 'emppass1', 30, 'Bob', 'Smith', 'employee'),
('u_00003', 'employee2', 'emppass2', 28, 'Charlie', 'Brown', 'employee'),
('u_00004', 'employee3', 'emppass3', 35, 'David', 'Davis', 'employee'),
('u_00005', 'employee4', 'emppass4', 32, 'Eva', 'Miller', 'employee'),
('u_00006', 'employee5', 'emppass5', 29, 'Frank', 'Wilson', 'employee'),
('u_00007', 'employee6', 'emppass6', 31, 'Grace', 'Moore', 'employee'),
('u_00008', 'employee7', 'emppass7', 40, 'Hank', 'Taylor', 'employee'),
('v_00001', 'vet1', 'vetpass1', 50, 'Irene', 'Anderson', 'vet'),
('v_00002', 'vet2', 'vetpass2', 48, 'Jack', 'Thomas', 'vet'),
('v_00003', 'vet3', 'vetpass3', 47, 'Kara', 'Jackson', 'vet'),
('v_00004', 'vet4', 'vetpass4', 46, 'Liam', 'White', 'vet'),
('v_00005', 'vet5', 'vetpass5', 49, 'Mia', 'Harris', 'vet'),
('v_00006', 'vet6', 'vetpass6', 51, 'Noah', 'Martin', 'vet'),
('v_00007', 'vet7', 'vetpass7', 45, 'Olivia', 'Thompson', 'vet');

-- --------------------------------------------------------

--
-- Table structure for table `user_animal_experience`
--

CREATE TABLE `user_animal_experience` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `animal_id` int(11) DEFAULT NULL,
  `proficiency` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_animal_experience`
--

INSERT INTO `user_animal_experience` (`id`, `user_id`, `animal_id`, `proficiency`) VALUES
(1, 'u_00002', 1, 5),
(2, 'u_00002', 3, 4),
(3, 'u_00002', 12, 7),
(4, 'u_00003', 2, 6),
(5, 'u_00003', 5, 8),
(6, 'u_00003', 26, 7),
(7, 'u_00004', 4, 9),
(8, 'u_00004', 11, 6),
(9, 'u_00004', 28, 10),
(10, 'u_00005', 6, 3),
(11, 'u_00005', 7, 7),
(12, 'u_00005', 19, 4),
(13, 'u_00006', 8, 8),
(14, 'u_00006', 21, 6),
(15, 'u_00006', 35, 5),
(16, 'u_00007', 9, 2),
(17, 'u_00007', 23, 5),
(18, 'u_00007', 37, 3),
(19, 'u_00008', 10, 7),
(20, 'u_00008', 22, 9),
(21, 'u_00008', 38, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `type` varchar(50) NOT NULL,
  `role` varchar(255) NOT NULL,
  `pages_modifiable` text DEFAULT NULL,
  `pages_viewable` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`type`, `role`, `pages_modifiable`, `pages_viewable`) VALUES
('admin', 'Can create and manage all users, modify info on the animals in the database, and consult veterinary reports', 'all', 'all'),
('employee', 'Can update animal details and view user profiles', 'animal_details', 'animal_details, user_details'),
('vet', 'Can consult and update veterinary reports and view animal details', 'animal_health', 'animal_details, user_details');

-- --------------------------------------------------------

--
-- Table structure for table `vet_specializations`
--

CREATE TABLE `vet_specializations` (
  `id` int(11) NOT NULL,
  `vet_id` varchar(10) DEFAULT NULL,
  `animal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vet_specializations`
--

INSERT INTO `vet_specializations` (`id`, `vet_id`, `animal_id`) VALUES
(1, 'v_00001', 1),
(2, 'v_00001', 2),
(3, 'v_00002', 3),
(4, 'v_00002', 4),
(5, 'v_00003', 5),
(6, 'v_00003', 6),
(7, 'v_00004', 7),
(8, 'v_00004', 8),
(9, 'v_00005', 9),
(10, 'v_00005', 10),
(11, 'v_00006', 11),
(12, 'v_00006', 12),
(13, 'v_00007', 13),
(14, 'v_00007', 14);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `username`, `password`, `name`, `lastname`, `age`) VALUES
(1, 'visitor1', 'visitorpass1', 'John', 'Doe', 30),
(2, 'visitor2', 'visitorpass2', 'Jane', 'Smith', 25),
(3, 'visitor3', 'visitorpass3', 'Emily', 'Johnson', 35);

-- --------------------------------------------------------

--
-- Table structure for table `zoo_locations`
--

CREATE TABLE `zoo_locations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `area` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zoo_locations`
--

INSERT INTO `zoo_locations` (`id`, `name`, `area`, `description`) VALUES
(1, 'Big Cats Area', 'North Wing', 'Area dedicated to big cats like lions, tigers, and leopards.'),
(2, 'African Savannah', 'South Wing', 'Area simulating the African savannah for animals like giraffes and zebras.'),
(3, 'Tropical Rainforest', 'East Wing', 'Area dedicated to tropical rainforest animals.'),
(4, 'Desert Exhibit', 'West Wing', 'Exhibit for desert animals.'),
(5, 'Aquatic Zone', 'Central Area', 'Zone for aquatic animals like dolphins, seals, and sharks.'),
(6, 'Arctic Zone', 'North East Wing', 'Zone for arctic animals like polar bears and penguins.'),
(7, 'Aviary', 'South East Wing', 'Large enclosure for birds.'),
(8, 'Primate House', 'North West Wing', 'House dedicated to primates.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal_habitat_relations`
--
ALTER TABLE `animal_habitat_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `habitat_id` (`habitat_id`),
  ADD KEY `zoo_location_id` (`zoo_location_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitor_username` (`visitor_username`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `habitats`
--
ALTER TABLE `habitats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_type` (`role_type`);

--
-- Indexes for table `user_animal_experience`
--
ALTER TABLE `user_animal_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `vet_specializations`
--
ALTER TABLE `vet_specializations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vet_id` (`vet_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `zoo_locations`
--
ALTER TABLE `zoo_locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `animal_habitat_relations`
--
ALTER TABLE `animal_habitat_relations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `habitats`
--
ALTER TABLE `habitats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_animal_experience`
--
ALTER TABLE `user_animal_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `vet_specializations`
--
ALTER TABLE `vet_specializations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zoo_locations`
--
ALTER TABLE `zoo_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_habitat_relations`
--
ALTER TABLE `animal_habitat_relations`
  ADD CONSTRAINT `animal_habitat_relations_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `animal_habitat_relations_ibfk_2` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`),
  ADD CONSTRAINT `animal_habitat_relations_ibfk_3` FOREIGN KEY (`zoo_location_id`) REFERENCES `zoo_locations` (`id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`visitor_username`) REFERENCES `visitors` (`username`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_type`) REFERENCES `user_roles` (`type`);

--
-- Constraints for table `user_animal_experience`
--
ALTER TABLE `user_animal_experience`
  ADD CONSTRAINT `user_animal_experience_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_animal_experience_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);

--
-- Constraints for table `vet_specializations`
--
ALTER TABLE `vet_specializations`
  ADD CONSTRAINT `vet_specializations_ibfk_1` FOREIGN KEY (`vet_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `vet_specializations_ibfk_2` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
