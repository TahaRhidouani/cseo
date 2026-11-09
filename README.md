# CSEO

Build using HTML/CSS, Bootstrap and Jquery for the frontend and PHP for the form submission, this website has a beautiful modern look, updated from it's previous look, that the owner of the club had kept since the club's debut in 2007.

This website is bilingual (french and english) which the user can pick upon first loading on the website. It also has an updated interactive registration form, which the customer can select his favorite positions to play along with skill level and more. Finally, it is also loaded with a modern photo gallery to showcase the club's best moments.

![intro](https://github.com/TahaInc/cseo/blob/master/images/screenshot_1.png?raw=true)

![homepage](https://github.com/TahaInc/cseo/blob/master/images/screenshot_2.png?raw=true)

![registration](https://github.com/TahaInc/cseo/blob/master/images/screenshot_3.png?raw=true)

## Run

Every push to `main` builds `ghcr.io/taharhidouani/cseo` (tags `main` and `sha-<commit>`) on GitHub Actions. The image serves the site with FrankenPHP on port 8080 and answers `GET /healthz`. It writes no files.

```sh
docker build -t cseo .
docker run --rm -p 8080:8080 cseo
```

The registration form (`registration.php`) uses PHP `mail()`, which needs a mail transport the image does not include.
