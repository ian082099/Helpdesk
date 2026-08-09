<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Citcs Help Desk</title>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" href="./img/cs.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Zeyada&display=swap');

        /* Your existing CSS styles */
        * {
           
            margin: 0;
            box-sizing: border-box;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
        }

   
        main {	
            justify-content: center;
            background-image: url(./img/bg1.png);
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        .card {
            height: 100vh;
            width: 100%;
            opacity: .8;
            background-color: rgba(0, 0, 0, .3);
            
        }

        main .card1 {
            width: 900px; /* Adjust width */
            height: 500px; /* Adjust height */;
            border-radius: 5%;
            position: relative;
            border: 1px solid rgb(96, 126, 151);
            background-color: rgba(0, 0, 0, .3);
            box-shadow: 0px 0px 700px 50px black;
            margin-bottom: -150px; /* Adjust margin-bottom for space */
        }

        .card,
        .card1 {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        
        .card1 {
           margin-top: 10px;
        }
        

        img {
    /* Remove absolute positioning and adjust styles */
    border-radius: 80%;
    width: 150px;
    height: 150px;
    cursor: pointer;
        margin-top: -10px;
}



        .card1,
        .profilet {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profilet {
            color: #c4c4c4;
            margin-top: 50px;
            margin-left: 50px;
            margin-right: 50px;
            flex-direction: column;
        }

        .line {
            display: flex;
            align-items: center;
            border-left: 2px solid #c4c4c4;
            height: 100px;
            opacity: .5;
            margin-top: 40px;
            border-radius: 50%;
        }

        hr {
            height: 4px;
            width: 390px;
            opacity: .5;
            margin: 6px;
        }

        .card1,
        .mainbody {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #c4c4c4;
        }

        .skills,
        .hobbies {
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .br {
            align-items: center;
            display: block;
            margin-bottom: 0.4em;
        }

         

        i {
            font-size: 40px;
            cursor: pointer;
            transition: .4s;
        }

        i:hover {
            color: rgb(28, 199, 199);
            transform: scale(1.5);
        }

        a {
            color: rgb(96, 126, 151);
            margin: 20px;
            align-items: center;
        }

     


        footer {
            background-color: #910000;
            color: #fff;
            padding: 20px;
            text-align: center;
               
        }

        /* Styling links within the footer */
        footer a {
            color: #fff;
            text-decoration: none;
        }

        /* Styling links on hover */
        footer a:hover {
              text-decoration: none;
        }
.container {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Change alignment to start */
    margin-top: -100px; /* Add margin-top to create space between navbar and image */
    margin-left: 50px; /* Add margin-left to move the image to the left */
}

.navbar {
    position: fixed; /* Add this line to fix the navbar position */
    top: 0; /* Add this line to position the navbar at the top */
    left: 0;
    width: 100%;
    padding: 10px 0; /* Add vertical padding of 10px and no horizontal padding */
    margin: 0; /* Update margin to 0 */
    z-index: 1000;
    text-align: center;
    color: white;
    background-color: #910000;
    backdrop-filter: blur(1px); /* Add backdrop-filter property */
}


.nav-links {
    display: flex;
    list-style: none;
        padding: 0;
}
 .nav-links li {
            display: inline;
            margin: 0 10px;
        }
.nav-links li a {
    text-decoration: none;
    color: #fff; /* Change color of links to white */
    transition: box-shadow 0.3s ease; /* Add transition effect */
    font-weight: bold; 
}

.nav-links li a:hover {
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.5); /* Add box shadow effect on hover */
}

.about-content p {
    margin-bottom: 15px;
    font-size: 19px; /* Adjust the font size as needed */
    line-height: 1.5; /* Adjust the line height as needed */
    color: #fff; /* Change font color to pure white */
}

    </style>
</head>
<body>
    <main>
        <div class="card">
            <div class="container">
                <img src="./img/cs.png" alt="Picture">
            </div>
            <div class="navbar">
            <ul class="nav-links">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
               <a class="nav-link" href="about.php"><i class="fas fa-info"></i> About us</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-plus-circle"></i> Create Ticket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fas fa-ticket-alt"></i> View Ticket</a>
                </li>
            </ul>
        </div>
            <div class="card1">
                <div class="profilet">
                   <h1 style="font-family: 'Roboto', sans-serif; color: #fff; sans-serif; font-size: 36px;">About Us</h1>

                    <span class="br"></span>
                    <hr color="#c4c4c4">
                    <span class="br"></span>
                    <div class="about-content">
                        <h2 style="margin-top: 20px;">Mission</h2>
                        <p>To provide quality, affordable and relevant education responsive to the changing needs of the local and global communities through effective and efficient integration of instruction, research and extension; to develop productive and God-loving individuals in society.</p>
                        <h2>Vision</h2>
                        <p>IA dynamic and highly competitive Higher Education Institution (HEI) committed to people empowerment towards building a humane society.</p>
                        <h2>Address</h2>
                        <p>University Road NBP Reservation Brgy. Poblacion, City of Muntinlupa. Philippines, 1776</p>
                        <h2>Email Address</h2>
                        <p>plmuncomm@plmun.edu.ph</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p><a href="https://www.google.com/maps/search/?api=1&query=University+Road+NBP+Reservation+Brgy.+Poblacion%2C+City+of+Muntinlupa%2C+Philippines%2C+1776" target="_blank"><i class="fas fa-map-marker-alt fa-sm"></i> University Road NBP Reservation Brgy. Poblacion, City of Muntinlupa. Philippines, 1776</a></p>
        <p><i class="far fa-envelope fa-sm"></i> plmuncomm@plmun.edu.ph</p>
        <p><a href="https://www.facebook.com/PLMUN.BSCS.SOCIETY" target="_blank"><i class="fab fa-facebook-square fa-sm"></i> Visit our Facebook page</a></p>
    </footer>
</body>
</html>
