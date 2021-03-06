<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/godgodwinter/README-TEMPLATE-laravel">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">LARAVEL + VUEJS PENERAPAN PADA METODHE PROMETHEE</h3>

  <p align="center">
     SELEKSI MAHASISWA BERPRESTASI  MENGGUNAKAN METHODE PROMETHEE- DSS - DATA MINING
    <br />
    <a href="https://github.com/godgodwinter/laravel-promethee-mahasiswa-berprestasi"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="#">View Demo</a>
    ·
    <a href="https://twitter.com/kakadlz">Report Bug</a>
    ·
    <a href="https://twitter.com/kakadlz">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project


Contoh penerapan Laravel + VUEjs PADA Pada Project Data mining dengan Studi kasus seleksi mahasiswa menggunakan metode PROMETHEE.

### Built With

This section should list any major frameworks that you built your project using. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)
* [Laravel 8](https://laravel.com)
* [PHP 7.4+](https://php.net)
* [Nodejs](https://node.js)
* [gitbash](https://git-scm.com/downloads)
* [composer](https://getcomposer.org/)



<!-- GETTING STARTED -->
## Getting Started

Siapkan terlebih dahulu peralatan perangnya.

<!-- ### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* npm
  ```sh
  npm install npm@latest -g
  ``` -->

### Installation

<!-- 1. Get a free API Key at [https://example.com](https://example.com) -->
1. Clone the repo
   ```sh
   git clone https://github.com/godgodwinter/laravel-promethee-mahasiswa-berprestasi.git
   ```
2. Install menggunakan composer
   ```sh
   composer install
   ```
3. Buat file .env atau copy dan edit file .env_copy kemudian sesuaikan dengan database anda

4. jalankan server Laravel
   ```sh
   php artisan serve
   ```
5. lakukan migrasi database
   ```sh
   php artisan migrate
   ```
   atau migrate:fresh jika ingin dari data kosong
   ```sh
   php artisan migrate:fresh
   ```
6. Jika ingin menggunakan data palsu untuk testing lanjutkan langkah 6 ini
   ```sh
   php artisan db:seed --class=userseeder  //untuk meload data user admin@gmail.com pass 12345678 , kriteria dan detail kriteria secara default (load sekali saja)
   ```
7. Jalankan npm

   ```sh
   npm install && npm run dev
   ```


   ```sh
   npm run watch
   ```

Buka browser dan tulis alamat berikut
   
   ```sh
   http://127.0.0.1:8000/
   ```


<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Kukuh Setya Nugraha - [@kakadlz](https://twitter.com/kakadlz) 
Kukuh Setya Nugraha - [@kukuh.sn](https://www.instagram.com/kukuh.sn/) 

Project Link: [https://github.com/godgodwinter/inetwork](https://github.com/godgodwinter/laravel-promethee-mahasiswa-berprestasi)






<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/godgodwinter/inetwork.svg?style=for-the-badge
[contributors-url]: https://github.com/godgodwinter/inetwork/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/godgodwinter/inetwork.svg?style=for-the-badge
[forks-url]: https://github.com/godgodwinter/inetwork/network/members
[stars-shield]: https://img.shields.io/github/stars/godgodwinter/inetwork.svg?style=for-the-badge
[stars-url]: https://github.com/godgodwinter/inetwork/stargazers
[issues-shield]: https://img.shields.io/github/issues/godgodwinter/inetwork.svg?style=for-the-badge
[issues-url]: https://github.com/godgodwinter/inetwork/issues
[license-shield]: https://img.shields.io/github/license/godgodwinter/inetwork.svg?style=for-the-badge
[license-url]: https://github.com/godgodwinter/inetwork/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.instagram.com/kukuh.sn/
[product-screenshot-dashboardluar]: images/dashboardluar.png
[product-screenshot-dashboardlm]: images/dashboardlm.png
[product-screenshot-tagihan]: images/tagihan.png
