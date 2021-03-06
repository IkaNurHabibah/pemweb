<?php
    include ('Conn.php'); 

    $title="IkaNH";
    $logname="IKA NUR HABIBAH";
    $logcv="CURRICULUM VITAE";
    $menu1="About";
    $menu2="Education";
    $menu3="Hobbies";
    $menu4="Favorite Movie";
    $menu5="Contact";
    $menu6="Social Media";
    $menu1_det="Halo..  Saya Ika, Mahasiswa Teknik Informatika di salah satu Perguruan Tinggi Negeri di daerah Surabaya";
    $menu5_li1="085230557313";
    $menu5_li2="Malasan Kulon RT01/ <br>RW001 kec. leces <br>kab. probolinggo";
    $menu5_li3="ikaa1239@gmail.com";
    $menu6_li1="_tdkdiketahui1";
    $menu6_li2="085230557313";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="profil">
        <img src="profil.jpg">
    </div>
    <div class="logname">
        <h1><?php echo $logname?> <br><?php echo $logcv?></h1>
    </div>
    <div id="line-logo"></div>

    <div class="About">
        <div id="line-about"></div>
        <div id="kotak-about">
        <h1 class="a"><?php echo $menu1?></h1>
        <div class="About-name">
            <p><?php echo $menu1_det?></p>
        </div>
        </div>
    </div>

    <div class="education">
        <div id="kotak-education">
        <h1 class="b"><?php echo $menu2?></h1>


        <div id="line-edu"></div>

        <?php 
            $query = "SELECT * FROM education";
            $result = mysqli_query(connection(),$query);
        ?>

        <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="img1">
                <img src="pensil.png">
            </div>
            <div class="sd">
                <p><?php echo $data['namaSD'];  ?></p>
            </div>
            <div class="img2">
                <img src="mejakursi.png">
            </div>
            <div class="smp">
                <p><?php echo $data['namaSMP'];  ?></p>
            </div>
            <div class="img3">
                <img src="tas.jpg">
            </div>
            <div class="sma">
                <p><?php echo $data['namaSMA'];  ?></p>
            </div>
            <div class="img4">
                <img src="sekolah.png">
            </div>
            <div class="kuliah">
                <p><?php echo $data['namaUNIV'];  ?></p>
            </div>
        <?php endwhile ?>
        </div>
    </div>

    <div class="hobbies">
        <div id="kotak-hobbies">
            <div id="line-hobbies"></div>
        <h1 class="c"><?php echo $menu3?></h1>

        <?php 
            $query = "SELECT * FROM hobbies";
            $result = mysqli_query(connection(),$query);
        ?>
        <?php while($data = mysqli_fetch_array($result)): ?>

        <div class="img11">
            <img src="buku.jpg">
        </div>
        <div class="buku">
            <p><?php echo $data['hobi1'];?></p>
        </div>
        <div class="img12">
            <img src="tulisan.jpg">
        </div>
        <div class="tulisan">
            <p><?php echo $data['hobi2']; ?></p>
        </div>
        <div class="img13">
            <img src="pohon.jpg">
        </div>
        <div class="pohon">
            <p><?php echo $data['hobi3'];?></p>
        </div>
    </div>
    <?php endwhile ?>
    </div>

    <div class="movies">
        <div id="kotak-movies">
        <h1 class="d"><?php echo $menu4?></h1>
        <div id="line-movie"></div>

        <div class="moviess">
            <img src="film.png">
        </div>
        

        <?php 
            $query = "SELECT * FROM movies";
            $result = mysqli_query(connection(),$query);
        ?>
        <?php while($data = mysqli_fetch_array($result)): ?>

        <div class="weag">
            <p><?php  echo $data['movie1'];?></p>
        </div>
        <div class="surti">
            <p><?php  echo $data['movie2'];?></p>
        </div>
        <div class="hanun">
            <p><?php  echo $data['movie3'];?></p>
        </div>
    </div>
    <?php endwhile ?>
    </div>

    <div class="contact">
        
        <h1 class="e"><?php echo $menu5?></h1>
        <div id="line-contact"></div>
        <div class="img21">
            <img src="phone-call.svg">
            <div class="telp">
                <p><?php echo $menu5_li1?></p>
            </div>
        </div>
        <div class="img22">
            <img src="house.svg">
            <div class="rumah">
                <p><?php echo $menu5_li2?></p>
            </div>
        </div>
        <div class="img23">
            <img src="envelope.svg">
            <div class="email">
                <p><?php echo $menu5_li3?></p>
            </div>
        </div>
    </div>

    <div class="footer">
        <div id="kotak-sosmed"></div>
        <h1 class="f"><?php echo $menu6?></h1>
        <div class="instagram">
            <img src="instagram.png">
        </div>
        <div class="ig">
            <p><?php echo $menu6_li1?></p>
        </div>
        <div class="whatsapp">
            <img src="whatsapp.png">
        </div>
        <div class="wa">
            <p><?php echo $menu6_li2?></p>
        </div>
        </div>
    </div>
</body>
</html>
