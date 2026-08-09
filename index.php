<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citcs Help Desk</title>
<link href="style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" href="./img/cs.png" type="image/x-icon">
    <style>
    /* Specific Component Styles */
@keyframes bounceIn {
    from {
        transform: scale(0.5);
    }
    to {
        transform: scale(1);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

   @import url('https://fonts.googleapis.com/css2?family=Zeyada&display=swap');

        /* Your existing CSS styles */
        * {
           
            margin: 0;
            box-sizing: border-box;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
        }

        .skills {
            position: relative;
        }

        .skills:hover .description {
            display: block;
            animation: expandText 0.5s ease-in-out forwards;
        }

        .description {
            display: none;
            position: absolute;
            top: 160px; /* Adjust this value as needed */
            left: 0;
            width: auto;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .hobbies {
            position: relative;
        }

        .hobbies:hover .description {
            display: block;
            animation: expandText 0.5s ease-in-out forwards;
        }

        @keyframes expandText {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Define animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Apply animation to mainbody */
        .mainbody {
            animation: fadeIn 3s ease;
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
            width: 950px; /* Adjust width */
            height: 350px; /* Adjust height */;
            border-radius: 5%;
            position: relative;
            border: 1px solid rgb(96, 126, 151);
            background-color: rgba(0, 0, 0, .3);
            box-shadow: 0px 0px 700px 50px black;
            margin-bottom: -120px; /* Adjust margin-bottom for space */
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
    width: 250px;
    height: 250px;
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
    color: #ffffff; /* white */
    margin-top: 50px;
    margin-left: 50px;
    margin-right: 50px;
    flex-direction: column;
}
 p {
    font-size: 18px; /* Adjust the font size as needed */
    line-height: 1.5; /* Adjust the line height as needed */
   color: #ffffff; /* white */
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

        .md-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #910000;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .md-button:hover {
            background-color: #4E0000;
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
    align-items: flex-end; 
    margin-top: -100px; /* Add margin-top to create space between navbar and image */

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

    </style>
</head>
<body>
     
    <main>

  

    <div class="card">
     
         <div class="navbar">
            <ul class="nav-links">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
               <a class="nav-link" href="about.php"><i class="fas fa-info"></i> About us</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create_ticket.php"><i class="fas fa-plus-circle"></i> Create Ticket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_tickets.php"><i class="fas fa-ticket-alt"></i> View Ticket</a>
                </li>
            </ul>
        </div>
      
      <div class="container">
            <img src="./img/cs.png" alt="Picture">
        </div>

            <div class="card1">
            
                <div class="profilet">
                   
                    <h1 style="font-family: 'Roboto', sans-serif; font-size: 37px;">Help Desk</h1>

                    <span class="br"></span>
                    <hr color="#c4c4c4">
                    <span class="br"></span>
                    <p style="text-align:justify; font-family: 'Roboto', sans-serif;">Your one-stop solution for all your inquiries and support needs.
                     Our dedicated team is here to assist you every step of the way. Let's navigate through your challenges together!</p>
                </div>
                <div class="mainbody">
                    <div class="skills">
                        <h3><a href="create_ticket.php" class="md-button">Create Ticket</a></h3>
                        <div class="description">Click this if you want to Create Ticket</div>
                        <p>A ticket is a term used to describe a specific customer request, issue, inquiry, or concern. Please provide as much detail as possible. </p>
                        <span class="br"></span>
                    </div>
                    <div class="line"></div>
                    <div class="hobbies">
                        <h3><a href="view_tickets.php" class="md-button">View Ticket</a></h3>
                        <div class="description">Click to check your Ticket status.</div>
                        <p>We provide archives and history of all your current and past support requests complete with responses.</p>
                        <span class="br"></span>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    
    <footer>
      <p><a href="https://www.google.com/maps/search/?api=1&query=University+Road+NBP+Reservation+Brgy.+Poblacion%2C+City+of+Muntinlupa%2C+Philippines%2C+1776" target="_blank"><i class="fas fa-map-marker-alt fa-sm"></i> University Road NBP Reservation Brgy. Poblacion, City of Muntinlupa. Philippines, 1776</a></p>
<p><a href="mailto:plmuncomm@plmun.edu.ph"><i class="far fa-envelope fa-sm"></i> plmuncomm@plmun.edu.ph</a></p>

<p><a href="https://www.facebook.com/PLMUN.BSCS.SOCIETY" target="_blank"><i class="fab fa-facebook-square fa-sm"></i> Visit our Facebook page</a></p>
    </footer>
</body>
</html>
