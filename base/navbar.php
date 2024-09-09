<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
   <style>
    * { 
    box-sizing: border-box; 
    transition: .25s ease-in-out; 
    margin: 0; 
    padding: 0; 
    }

    html, body { 
    height: 100%; 
    overflow: hidden; 
    font-family: Arial, sans-serif;
    }

    #drawer-toggle { 
    position: absolute; 
    opacity: 0; 
    }

    #drawer-toggle-label { 
    user-select: none; 
    left: 0; 
    height: 50px; 
    width: 50px; 
    display: block; 
    position: fixed; 
    background: rgba(255,255,255,0); 
    z-index: 2;
    cursor: pointer;
    }

    /* Hamburger menu icon */
    #drawer-toggle-label:before { 
    content: ''; 
    display: block; 
    position: absolute; 
    height: 2px; 
    width: 30px; 
    background: #8d8d8d; 
    left: 40px; 
    top: 18px; 
    box-shadow: 0 8px 0 #8d8d8d, 0 16px 0 #8d8d8d; 
    } 

    /* Drawer styles */
    #drawer { 
    position: fixed; 
    top: 0; 
    left: -400px; /* Increase drawer width */
    height: 100%; 
    width: 400px; /* Increase drawer width */
    background: #34495e; /* Darker background color */
    overflow-y: scroll; 
    padding: 20px; 
    transition: left 0.3s ease-in-out;
    z-index: 1;
    }

    /* Style for the header */
    header { 
    width: 100%; 
    height: 60px;
    position: fixed; 
    left: 0; 
    background: #2c3e50; 
    color: white;
    padding: 15px 40px; /* Adjust padding for header */
    font-size: 24px; /* Increase header font size */
    font-weight: bold;
    line-height: 50px; 
    z-index: 0; 
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    /* Page content container */
    #page-content { 
    margin-left: 0; 
    margin-top: 50px; 
    padding: 20px; 
    overflow-y: auto; 
    height: calc(100% - 50px);
    }

    /* Menu items list */
    #drawer ul { 
    list-style-type: none; 
    padding: 0; 
    }

    /* Menu links */
    #drawer ul a { 
    display: block; 
    padding: 15px 20px; 
    color: #ecf0f1; 
    font-size: 18px; 
    font-weight: bold;
    text-decoration: none; 
    border-bottom: 1px solid #7f8c8d;
    transition: background 0.3s ease;
    }

    /* Hover effects for menu items */
    #drawer ul a:hover { 
    background: #16a085; 
    color: white;
    }

    /* Drawer open state */
    #drawer-toggle:checked ~ #drawer-toggle-label { 
    width: calc(100% - 400px); 
    background: rgba(255,255,255,0.8); 
    }

    #drawer-toggle:checked ~ #drawer-toggle-label, 
    #drawer-toggle:checked ~ header { 
    left: 400px; 
    }

    #drawer-toggle:checked ~ #drawer { 
    left: 0px; 
    }

    /* Adjust content when the drawer is open */
    #drawer-toggle:checked ~ #page-content { 
    margin-left: 400px; 
    }

    /* Responsive Media Query */
    @media all and (max-width: 600px) { 
    #drawer { 
    width: 250px; 
    }
    #drawer-toggle:checked ~ #drawer-toggle-label, 
    #drawer-toggle:checked ~ header { 
    left: 250px; 
    }
    #drawer-toggle:checked ~ #page-content { 
    margin-left: 250px; 
    }
    }
   </style>
</head>
<body>
   <input type="checkbox" id="drawer-toggle" name="drawer-toggle"/>
   <label for="drawer-toggle" id="drawer-toggle-label"></label>
   <header></header>
   <nav id="drawer">
      <ul>
         <li><a href="welcome.php">Home</a></li>
         <li><a href="signup.php">Sign Up</a></li>
         <li><a href="login.php">Login</a></li>
      </ul>
   </nav>
   
</body>
</html>
 
