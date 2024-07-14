-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 27, 2024 at 10:59 PM
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
(3, 3, 2, 1),
(4, 4, 1, 3),
(5, 5, 1, 3),
(6, 6, 2, 3),
(7, 7, 1, 3),
(8, 8, 5, 4),
(9, 9, 2, 3),
(10, 10, 6, 7),
(11, 11, 1, 7),
(12, 12, 1, 1),
(13, 13, 1, 1),
(14, 14, 2, 1),
(15, 15, 2, 3),
(16, 16, 2, 3),
(17, 17, 1, 3),
(18, 18, 1, 3),
(19, 19, 6, 4),
(20, 20, 6, 4),
(21, 21, 4, 8),
(22, 22, 4, 8),
(23, 23, 2, 3),
(24, 24, 2, 3),
(25, 25, 1, 3),
(26, 26, 1, 7),
(27, 27, 4, 8),
(28, 28, 4, 8),
(29, 29, 4, 8),
(30, 30, 1, 1),
(31, 31, 1, 1),
(32, 32, 1, 1),
(33, 33, 1, 1),
(34, 34, 6, 7),
(35, 35, 6, 7),
(36, 36, 6, 7),
(37, 37, 5, 4),
(38, 38, 5, 4),
(39, 39, 5, 4),
(40, 40, 5, 4),
(41, 41, 5, 4),
(42, 42, 5, 4),
(43, 43, 5, 4),
(44, 44, 5, 4),
(45, 45, 5, 4),
(46, 46, 5, 4),
(47, 47, 5, 4),
(48, 48, 5, 4),
(49, 49, 5, 4),
(50, 50, 5, 4);

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
(5, 'Ocean', 'Marine', 'Seaweed, algae', 'Oceans are large bodies of saltwater.'),
(6, 'Wetlands', 'Humid', 'Marshes, swamps', 'Wetlands are areas of land saturated with water.'),
(7, 'Grassland', 'Temperate', 'Grasses', 'Grasslands are large open areas of grass.'),
(8, 'Mountain', 'Cold', 'Sparse vegetation', 'Mountain habitats are characterized by high elevations and cooler climates.');

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
(2, 'Elephant Enclosure', 'East Wing', 'Large enclosure for elephants.'),
(3, 'Primate House', 'West Wing', 'Enclosure for various primate species.'),
(4, 'Aquatic Exhibit', 'South Wing', 'Exhibit for aquatic animals like dolphins, sharks, and sea lions.'),
(5, 'Bird Aviary', 'Central Plaza', 'Large aviary for birds.'),
(6, 'Reptile House', 'North Wing', 'Enclosure for reptiles like crocodiles and snakes.'),
(7, 'Savannah Exhibit', 'East Wing', 'Large open area replicating the African savannah.'),
(8, 'Arctic Zone', 'West Wing', 'Exhibit for animals from cold climates.'),
(9, 'Insectarium', 'Central Plaza', 'Exhibit for insects and small arthropods.'),
(10, 'Amphibian House', 'South Wing', 'Enclosure for amphibians like frogs and salamanders.');

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
-- Indexes for table `habitats`
--
ALTER TABLE `habitats`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `habitats`
--
ALTER TABLE `habitats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zoo_locations`
--
ALTER TABLE `zoo_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
