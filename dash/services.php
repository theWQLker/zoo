<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcadia Zoo Services</title>
    <style>
        body_srv {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container_srv {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .service-block_srv {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
            text-align: center;
        }
        .service-block_srv img {
            width: 100%;
            max-width: 600px;
            height: auto;
            margin-bottom: 20px;
        }
        .service-block_srv h2 {
            margin: 10px 0;
        }
        .service-block_srv p {
            margin: 10px 0;
        }
        @media (min-width: 768px) {
            .service-block_srv {
                flex-direction: row;
                text-align: left;
            }
            .service-block_srv img {
                margin-right: 20px;
                margin-bottom: 0;
            }
        }
    </style>
</head>
<?php include 'head.php'; ?>

<body class="body_srv">


<div class="container_srv">
    <div class="service-block_srv">
        <img src="images\wild.png" alt="Wildlife Experience">
        <div>
            <h2>Explore Our Wide Range of Services</h2>
            <p>Experience the wonders of wildlife at Arcadia Zoo! Wander through our lifelike habitats guided by our knowledgeable staff, or enjoy a scenic ride on our charming train. Immerse yourself in the beauty of nature. A memorable adventure awaits all animal enthusiasts! Don't wait any longer, whether you're alone or with family.</p>
        </div>
    </div>

    <div class="service-block_srv">
        <img src="path/to/your/image2.jpg" alt="Animal Feeding">
        <div>
            <h2>Captivating Wildlife</h2>
            <p>Whether you're intrigued by the power of big cats, mesmerized by the elegance of primates, or fascinated by the vibrant hues of tropical birds, Arcadia Zoo is a haven for nature lovers of all ages. Be sure to catch our feeding shows, where you can discover the dietary habits and natural behaviors of our animal inhabitants.</p>
        </div>
    </div>

    <div class="service-block_srv">
        <img src="images\zoo.webp" alt="Zoo Restaurant">
        <div>
            <h2>Dining Experience</h2>
            <p>The Arcadia Zoo restaurant provides a panoramic view of the surrounding animal habitats. Offering a variety of local and international dishes to suit all tastes and dietary needs, it's a perfect place to relax and enjoy a meal while taking in the sights.</p>
        </div>
    </div>

    <div class="service-block_srv">
        <img src="path/to/your/image4.jpg" alt="Guided Tours">
        <div>
            <h2>Guided Habitat Tours</h2>
            <p>Join a guided tour at Arcadia Zoo for an enlightening experience, where experts share intriguing facts about the animals and their behaviors. Our guides enrich your visit with interesting anecdotes, giving you a deeper appreciation of the wildlife.</p>
        </div>
    </div>

    <div class="service-block_srv">
        <img src="path/to/your/image5.jpg" alt="Train Tour">
        <div>
            <h2>Train Tour of the Zoo</h2>
            <p>Take a train tour at Arcadia Zoo to comfortably explore the various habitats. This picturesque ride offers breathtaking views of the animals and their surroundings.</p>
        </div>
    </div>
</div>

</body>
</html>
