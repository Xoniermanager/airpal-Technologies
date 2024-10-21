<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>

    <div
        style=" width: 35vw;
  min-width: 350px;
  margin: 6em auto;
  background-color: white;
  border-radius: 12px;
  border:1px solid #eee;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  padding: 24px;">


        <div style="width:100%;text-align: center;">

            <img src="{{ site('website_logo') }}" style="height: 80px">
            <h2>Wearable Health Monitoring Form</h2>
        </div>
        <div style="width:100%;text-align: center;">
            <table style=" width:80%; text-align: left; border: none; margin: auto;">
                <thead>
                    <tr>
                        <th>Name :</th>
                        <td>{{ $userDetails['name'] }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $userDetails['phone'] }}</td>
                    </tr>
                    <tr>
                        <th>Email :</th>
                        <td> {{ $userDetails['email'] }}</td>
                    </tr>
                    <tr>
                        <th>Message :</th>
                        <td> {{ $userDetails['message'] }}</td>
                    </tr>
                </thead>

            </table>

            <div style="margin-top: 20px;">
                <h2 style=" color: #0c75ac;
   
    margin-top: 4px;">Thank you!
                </h2>
            </div>
        </div>




    </div>


</body>

</html>
