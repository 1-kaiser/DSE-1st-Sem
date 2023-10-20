<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/clientSide.css">
</head>
<body>

    <div class="homepage-wrapper">

    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #dd7c37;">
      <div class="container" >
        <a class="navbar-brand" href="#">
            <span class="home">DITO LMISCITNA</span></a>
        <a class="navbar-brand " href="#request">
            <span class="goToRequest">Go to Request Page</span></a>
      </div>
    </nav>
    </div>


    
    <div class="request-wrapper" id="request">

        <div class="requestTitle">
            <strong>Need a Request?</strong>
        </div>

            <div class="requestForm-container">

                <div class="name mb-2">
                    <div class="clientName mb-2">Name</div>
                    <input type="text" class="inputWidth" placeholder="Your Name">
                </div>

                <div class="email mb-2">
                    <div class="clientName mb-2">Email</div>
                    <input type="text" class="inputWidth" placeholder="Email Address">
                </div>

                <div class="email mb-2">
                    <div class="clientName mb-2">Contact Number</div>
                    <input type="text" class="inputWidth" placeholder="Contact">
                </div>

                <div class="email mb-2">
                    <div class="clientName mb-2">Request</div>
                    <textarea name="" id="" cols="40" rows="5"></textarea>
                </div>

                <button class="btn btn-primary w-25" name="requestSubmit">Submit</button>
            </div>
        </div>

    </div>




    
</body>
</html>