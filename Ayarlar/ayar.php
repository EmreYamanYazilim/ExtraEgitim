<?php

try {
    $VeritabaniBaglantisi = new PDO("mysql:host=localhost;dbname=extraegitim;charset=utf8", "root", "");

} catch (PDOExpception $Hata) {
    //echo "bağlantı hatası <br /> " . $Hata->getMessage(); // bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin
    die();
}

$AyarlarSorgusu = $VeritabaniBaglantisi->prepare("SELECT * FROM ayarlar LIMIT 1 ");
$AyarlarSorgusu->execute();
$AyarlarSayisi = $AyarlarSorgusu->rowCount();
$Ayarlar = $AyarlarSorgusu->fetch(PDO::FETCH_ASSOC);

if ($AyarlarSayisi > 0) {

    $SiteAdi                = $Ayarlar["SiteAdi"];
    $SiteTitle              = $Ayarlar["SiteTitle"];
    $SiteDescription        = $Ayarlar["SiteDescription"];
    $SiteKeywords           = $Ayarlar["SiteKeywords"];
    $SiteCopyrightMetni     = $Ayarlar["SiteCopyrightMetni"];
    $SiteLogosu             = $Ayarlar["SiteLogosu"];
    $SiteEmailAdresi		= $Ayarlar["SiteEmailAdresi"];
    $SiteEmailSifresi		= $Ayarlar["SiteEmailSifresi"];
    $SiteEmailHostAdresi	= $Ayarlar["SiteEmailHostAdresi"];
    $SosyalLinkFacebook     = $Ayarlar["SosyalLinkFacebook"];
    $SosyalLinkTwitter      = $Ayarlar["SosyalLinkTwitter"];
    $SosyalLinkİnstegram    = $Ayarlar["SosyalLinkİnstegram"];
    $SosyalLinkYoutube      = $Ayarlar["SosyalLinkYoutube"];
    $SosyalLinkLinkedin     = $Ayarlar["SosyalLinkLinkedin"];
    $SosyalLinkPinterest    = $Ayarlar["SosyalLinkPinterest"];


} else {
    //echo "site ayar sorgusu hatalı";  // bu alanı kapatıyorum site hata yaparsa kullanıcı görmesin
    die();

}


$MetinlerSorgusu = $VeritabaniBaglantisi->prepare("SELECT * FROM sozlesmelervemetinler LIMIT 1");
$MetinlerSorgusu->execute();
$MetinlerSayisi = $MetinlerSorgusu->rowCount();
$Metinler = $MetinlerSorgusu->fetch(PDO::FETCH_ASSOC);

if ($MetinlerSayisi > 0) {
    $HakkimizdaMetni                = $Metinler["HakkimizdaMetni"];
    $UyelikSozlesmeMetni            = $Metinler["UyelikSozlesmeMetni"];
    $KullanimKosullariMetni         = $Metinler["KullanimKosullariMetni"];
    $GizlilikSozlesmesiMetni        = $Metinler["GizlilikSozlesmesiMetni"];
    $MesafeliSatisSozlesmesiMetni   = $Metinler["MesafeliSatisSozlesmesiMetni"];
    $TeslimatMetni                  = $Metinler["TeslimatMetni"];
    $IptalIadeDegisimMetni          = $Metinler["IptalIadeDegisimMetni"];


} else {
    //echo "site ayar sorgusu hatalı";  // bu alanı kapatıyorum site hata yaparsa kullanıcı görmesin
    die();

}




if (isset($_SESSION["Kullanici"])){

    $kullaniciSorgusu       =   $VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? LIMIT 1");
    $kullaniciSorgusu->execute([$_SESSION["Kullanici"]]);
    $kullaniciSayisi        =   $kullaniciSorgusu->rowCount();
    $Kullanici              =   $kullaniciSorgusu->fetch(PDO::FETCH_ASSOC);

    if ($kullaniciSayisi>0){
        $KullaniciID    =   $Kullanici["id"];
        $EmailAdresi    =   $Kullanici["EmailAdresi"];
        $Sifre          =   $Kullanici["Sifre"];
        $IsimSoyisim    =   $Kullanici["IsimSoyisim"];
        $TelefonNumarasi=   $Kullanici["TelefonNumarasi"];
        $Cinsiyet       =   $Kullanici["Cinsiyet"];
        $Durumu         =   $Kullanici["Durumu"];
        $KayitTarihi    =   $Kullanici["KayitTarihi"];
        $KayitIpAdresi  =   $Kullanici["KayitIpAdresi"];



    }else{
//            echo "bu sorgu hatalı";
        die();
    }



}







?>


