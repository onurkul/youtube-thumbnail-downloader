<?php
  if(isset($_POST['button'])){
    $imgUrl = $_POST['imgurl'];
    $ch = curl_init($imgUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $downloadImg = curl_exec($ch);
    curl_close($ch);
    header('Content-type: image/jpg');
    header('Content-Disposition: attachment;filename="www.onurkul.com.tr - thumbnail.jpg');
    echo $downloadImg;
  }
?>
<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <title>Youtube Küçük Resim (Thumbnail) İndirme | Onur KUL</title>
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Bu araç sayesinde Youtube küçük resimleri (thumbnail) kolay bir şekilde indirebilirsiniz."
    />
    <meta name="author" content="Onur KUL" />
    <meta name="publisher" content="Onur KUL" />
    <meta name="robots" content="all" />
    <meta name="revisit-after" content="1 Days" />
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:site_name" content="Onur KUL" />
    <meta
      property="og:image"
      content="https://onurkul.com.tr/uploads/logo/logo_61fda0d03b48f0-92709354-65066295.png"
    />
    <meta property="og:image:width" content="180" />
    <meta property="og:image:height" content="50" />
    <meta property="og:type" content="website/" />
    <meta property="og:title" content="Youtube Küçük Resim (Thumbnail) İndirme | Onur KUL" />
    <meta
      property="og:description"
      content="Bu araç sayesinde Youtube küçük resimleri (thumbnail) kolay bir şekilde indirebilirsiniz."
    />
    <meta
      property="og:url"
      content="https://onurkul.com.tr/araclar/youtube-thumbnail-indirme/"
    />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="Onur KUL" />
    <meta name="twitter:title" content="Youtube Küçük Resim (Thumbnail) İndirme | Onur KUL" />
    <meta
      name="twitter:description"
      content="Bu araç sayesinde Youtube küçük resimleri (thumbnail) kolay bir şekilde indirebilirsiniz."
    />
    <meta
      name="twitter:image"
      content="https://onurkul.com.tr/uploads/logo/logo_61fda0d03b48f0-92709354-65066295.png"
    />
    <link
      rel="canonical"
      href="https://onurkul.com.tr/araclar/youtube-thumbnail-indirme/"
    />
    <link
      rel="alternate"
      href="https://onurkul.com.tr/araclar/youtube-thumbnail-indirme/"
      hreflang="tr_TR"
    />
    <link
      rel="shortcut icon"
      type="image/png"
      href="https://onurkul.com.tr/uploads/logo/favicon_62096e9aa3b474-30316417-17601085.png"
    />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <header><h1 class="title">Youtube Küçük Resim (Thumbnail) İndir</h1></header>
    <div class="url-input">
      <span class="title">Video URL'sini Yapıştırın:</span>
      <div class="field">
        <input type="text" placeholder="https://www.youtube.com/watch?v=hO1w9DYzjrY" required>
        <input class="hidden-input" type="hidden" name="imgurl">
        <span class="bottom-line"></span>
      </div>
    </div>
    <div class="preview-area">
      <img class="thumbnail" src="" alt="">
      <i class="icon fas fa-cloud-download-alt"></i>
      <span>Önizlemeyi Görmek İçin Video URL'sini Yapıştırın</span>
    </div>
    <button class="download-btn" type="submit" name="button" disabled id="download">İndir</button>
    <div class="footer">
        <a href="https://onurkul.com.tr/" target="_blank" class="onurkul"
          >Telif Hakkı © 2023 Onur KUL - Tüm Hakları Saklıdır.</a
        >
      </div>
  </form>

  <script>
    const urlField = document.querySelector(".field input"),
    previewArea = document.querySelector(".preview-area"),
    imgTag = previewArea.querySelector(".thumbnail"),
    hiddenInput = document.querySelector(".hidden-input"),
    button = document.querySelector(".download-btn");

    urlField.onkeyup = ()=>{
      let imgUrl = urlField.value;
      previewArea.classList.add("active");
      button.style.pointerEvents = "auto";
      if(imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1){
        let vidId = imgUrl.split('v=')[1].substring(0, 11);
        let ytImgUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
        imgTag.src = ytImgUrl;
        document.getElementById("download").disabled = false;
      }else if(imgUrl.indexOf("https://youtu.be/") != -1){
        let vidId = imgUrl.split('be/')[1].substring(0, 11);
        let ytImgUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
        imgTag.src = ytImgUrl;
        document.getElementById("download").disabled = false;
      }else if(imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)){
        imgTag.src = imgUrl;
        document.getElementById("download").disabled = false;
      }else{
        imgTag.src = "";
        button.style.pointerEvents = "none";
        previewArea.classList.remove("active");
        document.getElementById("download").disabled = true;
      }
      hiddenInput.value = imgTag.src;
    }
  </script>
</body>
</html>
