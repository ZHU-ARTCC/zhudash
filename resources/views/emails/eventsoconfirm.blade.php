<style>
    @import url('https://fonts.googleapis.com/css?family=Oswald');
    
    .subject-header{
        font-family: 'Oswald', sans-serif;
    }
    
    .title-info{
        background-color: #FFF;
        color: #2C3E50;
        font-family: 'Oswald', sans-serif;
        padding: 20px;
    }
    
    .body{
        background-color: #ddd;
        color: #000;
        font-family: 'Oswald', sans-serif;
        padding: 10px;
    }
    
    .footer{
        background-color: #FFF;
        color: #555555;
        font-family: 'Oswald', sans-serif;
        padding: 20px;
    }
</style>

<center>
    <div class="col-md-8 title-info">
        <img src="//i1268.photobucket.com/albums/jj580/wguisbond/unspecified_zpsux38ulne.png" width="90%">
        <h1 class="subject-header">Event Sign-Up Confirmation</h1>
    </div>
</center>

<div class="col-md-8 body">
    Hello {{$name}},<br><br>
    
    This email is to confrim your request for a position at one of our upcoming events, as follows:<br><br>
    
    Positions (top 3): <br>
    {{$position}}
    <br><br>
    
    Thank you for joining us during this event! You will NOT get an email when the line up is announced, so be sure to check the website!<br><br>
    
    - ZHU Staff
    


</div>

<div class="col-md-8 footer">
    <center>
        Any information contained within this email is to be used for flight simulation purposes only, by the controllers in the Virtual Houston ARTCC and delegating parties. No material on this website is to be used for real world flight navigation, operation or other, simular activites. The Virtual ZHU ARTCC is a member of the VATSIM North America Division and herein is copyrighted respectively. 
    </center>
</div>


