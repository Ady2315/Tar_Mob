<?php 
    session_start();
    
    if (!isset($_SESSION['active'])) {
        if (isset($_COOKIE)) {
            if (isset($_COOKIE['active']) && isset($_COOKIE['nume'])) {
                $_SESSION['active'] = $_COOKIE['active'];
                $_SESSION['nume'] = $_COOKIE['nume'];
                $_SESSION['id_user'] = $_COOKIE['id_user'];
            }
            else {
                $_SESSION['active'] = false;
                $_SESSION['nume'] = "";
                $_SESSION['id_user'] = 0;
            }
        }
        else {
            setcookie("active", false, time() + (86400 * 30), "/");
            setcookie("nume", "", time() + (86400 * 30), "/");
            setcookie("id_user", 0, time() + (86400 * 30), "/");
        }
    }
    else {
        setcookie("active", $_SESSION['active'], time() + (86400 * 30), "/");
        setcookie("nume", $_SESSION['nume'], time() + (86400 * 30), "/");
        setcookie("id_user", $_SESSION['id_user'], time() + (86400 * 30), "/");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acasa</title>
    <link rel="stylesheet" href="./Styles/style.css">
    <link rel="icon" type="image/x-icon" href="./Images/logo-onlyImage.png">
    <!-- <link rel="stylesheet" href="./Styles/pallets.css"> -->
</head>
<body class="bg-page-dark color-dark">
    <header class="bg-box-dark nav-container">
        <div class="nav">
            <div id="logo-container">
                <svg id="logo" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 1000 709"><g transform="matrix(1,0,0,1,-0.6008762922060669,0.2870448130345835)"><svg viewBox="0 0 348 247" data-background-color="#444444" preserveAspectRatio="xMidYMid meet" height="709" width="1000" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="tight-bounds" transform="matrix(1,0,0,1,0.20910494968771332,-0.10000009706564583)"><svg viewBox="0 0 347.5817888786384 247.2" height="247.2" width="347.5817888786384"><g><svg viewBox="0 0 395.52000000000004 281.29363254453546" height="247.2" width="347.5817888786384"><g transform="matrix(1,0,0,1,0,170.94869583065076)"><svg viewBox="0 0 395.52000000000004 110.34493671388469" height="110.34493671388469" width="395.52000000000004"><g id="textblocktransform"><svg viewBox="0 0 395.52000000000004 110.34493671388469" height="110.34493671388469" width="395.52000000000004" id="textblock"><g><svg viewBox="0 0 395.52000000000004 78.16124168514413" height="78.16124168514413" width="395.52000000000004"><g transform="matrix(1,0,0,1,0,0)"><svg width="395.52000000000004" viewBox="1.149999976158142 -35 180.38999938964844 35.650001525878906" height="78.16124168514413" data-palette-color="#ffffff"><path d="M12.1-34.5L17.1-34.5 17.1 0 12.1 0 12.1-34.5ZM1.15-34.5L28.1-34.5 28.1-30.2 1.15-30.2 1.15-34.5ZM40.1-25L40.1-25Q42.9-25 44.82-24.28 46.75-23.55 47.72-21.8 48.7-20.05 48.7-17L48.7-17 48.7 0 44.9 0 44.15-5.3 43.85-5.9 43.85-17Q43.85-19.15 42.85-20.1 41.85-21.05 39.05-21.05L39.05-21.05Q37.15-21.05 34.27-20.85 31.4-20.65 28.6-20.45L28.6-20.45 28.15-23.9Q29.85-24.2 31.92-24.45 34-24.7 36.15-24.85 38.3-25 40.1-25ZM33.9-15.05L46.5-15.05 46.45-11.65 34.95-11.6Q33.25-11.55 32.57-10.73 31.9-9.9 31.9-8.45L31.9-8.45 31.9-6.95Q31.9-5.15 32.77-4.33 33.65-3.5 35.55-3.5L35.55-3.5Q36.95-3.5 38.67-4.03 40.4-4.55 42.15-5.63 43.9-6.7 45.3-8.35L45.3-8.35 45.3-5.2Q44.8-4.5 43.8-3.53 42.8-2.55 41.37-1.65 39.95-0.75 38.22-0.15 36.5 0.45 34.45 0.45L34.45 0.45Q32.25 0.45 30.57-0.33 28.9-1.1 27.95-2.63 27-4.15 27-6.35L27-6.35 27-9Q27-11.85 28.82-13.45 30.65-15.05 33.9-15.05L33.9-15.05ZM56-24.4L59.75-24.4 60.35-19.7 60.8-19 60.8 0 56 0 56-24.4ZM70.59-25L71.7-25 71.2-20.5 69.65-20.5Q67.59-20.5 65.47-19.7 63.35-18.9 60.3-17.4L60.3-17.4 59.95-20.35Q62.6-22.55 65.32-23.78 68.05-25 70.59-25L70.59-25ZM114.49-34.5L119.89-34.5Q121.84-34.5 121.89-32.45L121.89-32.45 123.29 0 118.39 0 117.14-30.45 116.14-30.45 108.84-5.7Q108.44-4.05 106.74-4.05L106.74-4.05 102.64-4.05Q100.89-4.05 100.44-5.7L100.44-5.7 93.14-30.45 92.14-30.45 90.99 0 86.09 0 87.44-32.45Q87.54-34.5 89.44-34.5L89.44-34.5 94.84-34.5Q96.44-34.5 96.94-32.85L96.94-32.85 102.99-12.45Q103.39-11.3 103.64-10.15 103.89-9 104.24-7.75L104.24-7.75 105.09-7.75Q105.44-9 105.72-10.15 105.99-11.3 106.34-12.55L106.34-12.55 112.39-32.85Q112.79-34.5 114.49-34.5L114.49-34.5ZM141.09-25L141.09-25Q145.39-25 147.96-23.75 150.54-22.5 151.66-19.68 152.79-16.85 152.79-12.2L152.79-12.2Q152.79-7.5 151.66-4.67 150.54-1.85 147.96-0.6 145.39 0.65 141.09 0.65L141.09 0.65Q136.84 0.65 134.26-0.6 131.69-1.85 130.54-4.67 129.39-7.5 129.39-12.2L129.39-12.2Q129.39-16.85 130.54-19.68 131.69-22.5 134.26-23.75 136.84-25 141.09-25ZM141.09-21.1L141.09-21.1Q138.59-21.1 137.14-20.3 135.69-19.5 135.09-17.57 134.49-15.65 134.49-12.2L134.49-12.2Q134.49-8.75 135.09-6.8 135.69-4.85 137.14-4.08 138.59-3.3 141.09-3.3L141.09-3.3Q143.59-3.3 145.06-4.08 146.54-4.85 147.14-6.8 147.74-8.75 147.74-12.2L147.74-12.2Q147.74-15.65 147.14-17.57 146.54-19.5 145.06-20.3 143.59-21.1 141.09-21.1ZM172.69-25L172.69-25Q177.24-25 179.39-22.08 181.54-19.15 181.54-12.3L181.54-12.3Q181.54-9.2 181.01-6.8 180.49-4.4 179.24-2.75 177.99-1.1 175.86-0.25 173.74 0.6 170.49 0.6L170.49 0.6Q169.24 0.6 167.74 0.5 166.24 0.4 164.69 0.18 163.14-0.05 161.69-0.38 160.24-0.7 159.04-1.2L159.04-1.2 162.89-4.35Q164.19-3.95 165.46-3.7 166.74-3.45 168.01-3.38 169.29-3.3 170.39-3.3L170.39-3.3Q172.64-3.4 173.96-4.2 175.29-5 175.91-6.98 176.54-8.95 176.54-12.3L176.54-12.3Q176.54-15.55 176.06-17.43 175.59-19.3 174.36-20.13 173.14-20.95 170.89-20.95L170.89-20.95Q168.99-20.95 167.26-19.93 165.54-18.9 163.34-17.2L163.34-17.2 162.99-20.2Q164.44-21.75 165.99-22.83 167.54-23.9 169.24-24.45 170.94-25 172.69-25ZM159.04-35L163.89-35 163.89-26.1Q163.89-24.55 163.79-23.18 163.69-21.8 163.34-20.45L163.34-20.45 163.84-19.75 163.89-0.95 159.04-1.2 159.04-35Z" opacity="1" transform="matrix(1,0,0,1,0,0)" fill="#ffffff" class="undefined-text-0" data-fill-palette-color="primary" id="text-0"></path></svg></g></svg></g><g transform="matrix(1,0,0,1,75.54432000000001,96.61323497720622)"><svg viewBox="0 0 244.43136 13.731701736678476" height="13.731701736678476" width="244.43136"><g transform="matrix(1,0,0,1,0,0)"><svg width="244.43136" viewBox="0 -34.54999923706055 675.2999877929688 37.939998626708984" height="13.731701736678476" data-palette-color="#ffffff"><path d="M0 0L0-3.91 5.27-3.91 21.34-30.4 26.61-30.4 42.38-3.91 48.73-3.91 48.73 0 29.93 0 29.93-3.91 35.84-3.91 32.3-10.13 15.19-10.13 11.74-3.91 17.38-3.91 17.38 0 0 0ZM29.37-29.15L30.49-29.15 44.63-5.37 43.51-5.37 29.37-29.15ZM16.89-13.18L30.54-13.18 23.63-25.32 16.89-13.18ZM19.53-14.65L24.07-22.53 24.66-21.46 20.73-14.65 19.53-14.65ZM14.48-5.37L16.14-8.42 32.08-8.42 32.52-7.5 16.87-7.5 15.72-5.37 14.48-5.37ZM30.98 1.71L50.46 1.71 50.46-2.56 51.49-2.56 51.49 2.64 30.98 2.64 30.98 1.71ZM1.07 1.71L19.14 1.71 19.14-2.56 20.12-2.56 20.12 2.64 1.07 2.64 1.07 1.71ZM55.03 0L55.03-3.66 60.4-3.66 60.4-19.41 55.03-19.41 55.03-23.56 65.65-23.56 65.65-19.48Q66.4-20.46 67.47-21.34 68.53-22.22 69.87-22.88 71.21-23.54 72.8-23.91 74.39-24.29 76.19-24.29L76.19-24.29Q76.73-24.29 77.54-24.26 78.34-24.22 79.07-24.1L79.07-24.1 79.07-19.31Q78.22-19.51 77.39-19.58 76.56-19.65 75.78-19.65L75.78-19.65Q73.83-19.65 72.08-19.03 70.33-18.41 68.97-17.22 67.6-16.04 66.72-14.33 65.84-12.62 65.65-10.42L65.65-10.42 65.65-3.66 74.44-3.66 74.44 0 55.03 0ZM67.36-5.13L67.36-8.23Q67.36-10.52 67.94-12.33 68.53-14.14 69.61-15.38 70.7-16.63 72.26-17.29 73.83-17.94 75.78-17.94L75.78-17.94Q76.19-17.94 76.83-17.88 77.46-17.82 78.16-17.7 78.85-17.58 79.56-17.4 80.27-17.21 80.83-16.97L80.83-16.97 80.83-22.73 81.81-22.73 81.81-15.75Q81.13-16.04 80.33-16.27 79.54-16.5 78.72-16.67 77.9-16.85 77.15-16.93 76.39-17.02 75.78-17.02L75.78-17.02Q74-17.02 72.62-16.43 71.24-15.84 70.29-14.75 69.33-13.65 68.83-12.06 68.33-10.47 68.33-8.47L68.33-8.47 68.33-5.13 67.36-5.13ZM56.49-16.77L56.49-17.7 59.37-17.7 59.37-16.77 56.49-16.77ZM56.49 1.71L76.19 1.71 76.19-2.29 77.17-2.29 77.17 2.64 56.49 2.64 56.49 1.71ZM86.45 0L86.45-3.66 91.82-3.66 91.82-30.15 86.45-30.15 86.45-34.06 97.07-34.06 97.07-19.87Q97.82-20.8 98.88-21.61 99.95-22.41 101.26-23.01 102.58-23.61 104.12-23.95 105.66-24.29 107.34-24.29L107.34-24.29Q109.88-24.29 111.96-23.57 114.03-22.85 115.5-21.35 116.96-19.85 117.76-17.57 118.55-15.28 118.55-12.16L118.55-12.16 118.55-3.66 123.92-3.66 123.92 0 109.15 0 109.15-3.66 113.3-3.66 113.3-10.08Q113.3-12.06 113.12-13.61 112.93-15.16 112.59-16.04L112.59-16.04Q112.15-17.16 111.48-17.94 110.81-18.73 109.97-19.21 109.13-19.7 108.12-19.92 107.12-20.14 106-20.14L106-20.14Q104.8-20.14 103.52-19.7 102.24-19.26 101.03-18.47 99.82-17.68 98.79-16.6 97.75-15.53 97.07-14.28L97.07-14.28 97.07-3.66 101.22-3.66 101.22 0 86.45 0ZM98.77-23.24L98.77-32.81 99.75-32.81 99.75-23.88Q99.53-23.78 99.25-23.61 98.97-23.44 98.77-23.24L98.77-23.24ZM87.91-27.51L87.91-28.44 90.79-28.44 90.79-27.51 87.91-27.51ZM120.31-5.13L120.31-11.99Q120.31-14.14 119.98-15.98 119.65-17.82 118.99-19.3 118.33-20.78 117.37-21.85 116.4-22.92 115.13-23.56L115.13-23.56Q116.79-23.14 117.96-22.16 119.14-21.17 119.87-19.65 120.6-18.14 120.94-16.16 121.28-14.18 121.28-11.82L121.28-11.82 121.28-5.13 120.31-5.13ZM98.82-5.13L98.82-13.67Q99.43-14.75 100.28-15.63 101.12-16.5 102.09-17.13 103.07-17.75 104.13-18.09 105.2-18.43 106.27-18.43L106.27-18.43Q107.95-18.43 109.04-17.8 110.13-17.16 110.62-16.19L110.62-16.19Q109.86-16.75 108.81-17.13 107.76-17.5 106.22-17.5L106.22-17.5Q105.27-17.5 104.29-17.16 103.32-16.82 102.46-16.26 101.61-15.7 100.91-14.97 100.21-14.23 99.8-13.45L99.8-13.45 99.8-5.13 98.82-5.13ZM110.62 1.71L125.68 1.71 125.68-2.29 126.66-2.29 126.66 2.64 110.62 2.64 110.62 1.71ZM87.91 1.71L102.97 1.71 102.97-2.29 103.95-2.29 103.95 2.64 87.91 2.64 87.91 1.71ZM136.05-29.64L136.05-34.52 142.03-34.52 142.03-29.64 136.05-29.64ZM137.52-27L137.52-27.93 143.79-27.93 143.79-33.15 144.77-33.15 144.77-27 137.52-27ZM130.93 0L130.93-3.66 137.52-3.66 136.78-19.41 130.93-19.41 130.93-23.56 142.03-23.56 142.03-3.66 147.65-3.66 147.65 0 130.93 0ZM143.74-5.13L143.74-22.31 144.72-22.31 144.72-5.13 143.74-5.13ZM132.39-16.77L132.39-17.7 135.76-17.7 135.76-16.77 132.39-16.77ZM132.39 1.71L149.41 1.71 149.41-2.29 150.38-2.29 150.38 2.64 132.39 2.64 132.39 1.71ZM169.23 0L157.24-19.9 151.97-19.9 151.97-23.56 168.72-23.56 168.72-19.9 163.47-19.9 172.77-4 181.73-19.9 176.14-19.9 176.14-23.56 192.4-23.56 192.4-19.9 187.37-19.9 175.58 0 169.23 0ZM170.94 1.71L176.75 1.71 188.54-18.19 194.16-18.19 194.16-22.19 195.13-22.19 195.13-17.26 189.17-17.26 177.38 2.64 171.3 2.64 170.94 1.71ZM173.13-6.98L166.79-18.19 170.94-18.19 170.47-22.19 171.45-22.19 171.45-17.26 168.5-17.26 173.7-7.91 173.13-6.98ZM177.33-17.26L177.33-18.19 179.53-18.19 178.97-17.26 177.33-17.26ZM153.43-17.26L153.43-18.19 156.97-18.19 157.53-17.26 153.43-17.26ZM198.43-11.69L198.43-11.69Q198.43-13.96 199.38-16.21 200.33-18.46 202.2-20.25 204.06-22.05 206.82-23.17 209.58-24.29 213.17-24.29L213.17-24.29Q214.32-24.29 215.62-24.12 216.93-23.95 218.24-23.56 219.54-23.17 220.79-22.52 222.03-21.88 223.06-20.95L223.06-20.95 223.06-23.56 233.56-23.56 233.56-19.41 228.19-19.41 228.19-3.66 233.56-3.66 233.56 0 223.06 0 223.06-3.17Q222.11-2.22 220.9-1.49 219.69-0.76 218.33-0.27 216.98 0.22 215.53 0.48 214.07 0.73 212.63 0.73L212.63 0.73Q209.12 0.73 206.46-0.27 203.8-1.27 202.01-2.97 200.23-4.66 199.33-6.92 198.43-9.18 198.43-11.69ZM229.94-5.13L229.94-17.7 235.31-17.7 235.31-21.7 236.29-21.7 236.29-16.77 230.92-16.77 230.92-5.13 229.94-5.13ZM203.72-11.89L203.72-11.89Q203.72-9.86 204.44-8.23 205.16-6.59 206.41-5.44 207.65-4.3 209.36-3.66 211.07-3.03 213.05-3.03L213.05-3.03Q214.2-3.03 215.38-3.26 216.56-3.49 217.68-3.97 218.79-4.44 219.78-5.16 220.76-5.88 221.48-6.87 222.2-7.86 222.63-9.13 223.06-10.4 223.06-11.96L223.06-11.96Q223.06-13.7 222.25-15.25 221.45-16.8 220.09-17.97 218.74-19.14 216.93-19.82 215.12-20.51 213.12-20.51L213.12-20.51Q211.12-20.51 209.4-19.9 207.68-19.29 206.42-18.16 205.16-17.04 204.44-15.44 203.72-13.84 203.72-11.89ZM205.41-11.77L205.41-11.77Q205.41-13.31 205.98-14.59 206.55-15.87 207.58-16.81 208.61-17.75 210.02-18.27 211.44-18.8 213.12-18.8L213.12-18.8Q214.39-18.8 215.42-18.52 216.44-18.24 217.2-17.83 217.96-17.43 218.44-17 218.93-16.58 219.13-16.26L219.13-16.26Q217.81-16.99 216.42-17.43 215.03-17.87 213.12-17.87L213.12-17.87Q211.58-17.87 210.35-17.37 209.12-16.87 208.24-16.02 207.36-15.16 206.88-14.04 206.41-12.92 206.41-11.67L206.41-11.67Q206.41-10.5 206.68-9.47 206.95-8.45 207.54-7.58 208.14-6.71 209.11-5.99 210.07-5.27 211.44-4.74L211.44-4.74Q209.9-5 208.76-5.65 207.63-6.3 206.88-7.23 206.14-8.15 205.77-9.31 205.41-10.47 205.41-11.77ZM224.52 1.71L235.31 1.71 235.31-2.29 236.29-2.29 236.29 2.64 224.52 2.64 224.52 1.71ZM201.57-1.05L201.57-1.05Q202.58-0.24 203.84 0.4 205.11 1.05 206.55 1.5 208 1.95 209.55 2.2 211.1 2.44 212.66 2.44L212.66 2.44Q215.37 2.44 217.72 1.77 220.08 1.1 221.91-0.1L221.91-0.1 221.91 1.03Q220.08 2.12 217.68 2.75 215.27 3.37 212.68 3.37L212.68 3.37Q210.9 3.37 209.19 3.09 207.48 2.81 206.02 2.25 204.55 1.68 203.41 0.85 202.26 0.02 201.57-1.05ZM258.01-11.45L258.01-11.45Q258.01-13.72 258.97-15.93 259.92-18.14 261.79-19.89 263.65-21.63 266.41-22.72 269.17-23.8 272.76-23.8L272.76-23.8Q273.91-23.8 275.21-23.63 276.52-23.46 277.83-23.07 279.13-22.68 280.38-22.03 281.62-21.39 282.65-20.46L282.65-20.46 282.65-30.15 277.28-30.15 277.28-34.06 287.9-34.06 287.9-3.66 292.05-3.66 292.05 0 282.65 0 282.65-3.1Q280.74-1.25 278.06-0.26 275.37 0.73 272.22 0.73L272.22 0.73Q269.22 0.73 266.63-0.06 264.05-0.85 262.13-2.39 260.21-3.93 259.11-6.2 258.01-8.47 258.01-11.45ZM289.66-5.13L289.66-32.81 290.63-32.81 290.63-5.13 289.66-5.13ZM278.74-27.51L278.74-28.44 281.62-28.44 281.62-27.51 278.74-27.51ZM263.31-11.65L263.31-11.65Q263.31-9.67 263.96-8.08 264.61-6.49 265.82-5.37 267.02-4.25 268.74-3.64 270.47-3.03 272.64-3.03L272.64-3.03Q273.79-3.03 274.97-3.26 276.15-3.49 277.27-3.97 278.38-4.44 279.36-5.16 280.35-5.88 281.07-6.87 281.79-7.86 282.22-9.13 282.65-10.4 282.65-11.96L282.65-11.96Q282.65-13.7 281.84-15.17 281.04-16.65 279.68-17.72 278.33-18.8 276.52-19.41 274.71-20.02 272.71-20.02L272.71-20.02Q270.76-20.02 269.05-19.41 267.34-18.8 266.06-17.7 264.78-16.6 264.05-15.05 263.31-13.5 263.31-11.65ZM265.02-11.65L265.02-11.65Q265.02-13.04 265.57-14.23 266.12-15.43 267.12-16.33 268.12-17.24 269.55-17.75 270.98-18.26 272.71-18.26L272.71-18.26Q275.2-18.26 276.91-17.53 278.62-16.8 279.23-15.7L279.23-15.7Q277.91-16.55 276.26-16.94 274.62-17.33 272.71-17.33L272.71-17.33Q271.17-17.33 269.94-16.88 268.71-16.43 267.84-15.65 266.97-14.87 266.5-13.81 266.02-12.74 266.02-11.55L266.02-11.55Q266.02-6.93 271.22-4.76L271.22-4.76Q269.73-4.93 268.59-5.54 267.44-6.15 266.65-7.07 265.85-7.98 265.44-9.16 265.02-10.33 265.02-11.65ZM284.11 1.71L293.81 1.71 293.81-2.29 294.78-2.29 294.78 2.64 284.11 2.64 284.11 1.71ZM261.16-1.05L261.16-1.05Q262.17-0.24 263.43 0.4 264.7 1.05 266.14 1.5 267.59 1.95 269.14 2.2 270.69 2.44 272.25 2.44L272.25 2.44Q274.96 2.44 277.31 1.77 279.67 1.1 281.5-0.1L281.5-0.1 281.5 1.03Q279.67 2.12 277.27 2.75 274.86 3.37 272.27 3.37L272.27 3.37Q268.32 3.37 265.51 2.26 262.7 1.15 261.16-1.05ZM299.3-11.33L299.3-11.33Q299.3-13.92 300.25-16.26 301.2-18.6 303.11-20.39 305.01-22.17 307.84-23.23 310.67-24.29 314.41-24.29L314.41-24.29Q317.92-24.29 320.68-23.35 323.44-22.41 325.37-20.63 327.3-18.85 328.31-16.27 329.33-13.7 329.33-10.4L329.33-10.4 304.64-10.4Q304.86-8.64 305.78-7.28 306.69-5.91 308.11-4.97 309.53-4.03 311.32-3.54 313.11-3.05 315.07-3.05L315.07-3.05Q316.65-3.05 318.3-3.31 319.95-3.56 321.42-4 322.88-4.44 324.03-4.99 325.18-5.54 325.79-6.13L325.79-6.13 326.71-6.13 329.01-3.64Q326.49-1.49 322.89-0.38 319.29 0.73 314.95 0.73L314.95 0.73Q311.16 0.73 308.24-0.2 305.33-1.12 303.34-2.76 301.35-4.39 300.32-6.59 299.3-8.79 299.3-11.33ZM306.99-8.69L330.99-8.69Q331.03-9.06 331.06-9.48 331.08-9.91 331.08-10.4L331.08-10.4Q331.08-12.48 330.66-14.37 330.23-16.26 329.41-17.88 328.59-19.51 327.4-20.85 326.2-22.19 324.69-23.14L324.69-23.14Q326.3-22.51 327.65-21.4 329.01-20.29 329.98-18.7 330.96-17.11 331.51-15.04 332.06-12.96 332.06-10.4L332.06-10.4Q332.06-10.21 332.05-9.91 332.04-9.62 332.01-9.25 331.99-8.89 331.95-8.51 331.91-8.13 331.86-7.76L331.86-7.76 308.79-7.76Q309.26-6.98 310.5-6.16 311.75-5.35 313.73-4.79L313.73-4.79Q312.5-4.79 311.44-5.08 310.38-5.37 309.51-5.88 308.65-6.4 308-7.12 307.35-7.84 306.99-8.69L306.99-8.69ZM304.79-13.45L323.69-13.45Q323.3-15.14 322.48-16.46 321.66-17.77 320.46-18.66 319.27-19.56 317.73-20.03 316.19-20.51 314.36-20.51L314.36-20.51Q312.38-20.51 310.76-19.98 309.14-19.46 307.91-18.52 306.69-17.58 305.9-16.28 305.11-14.99 304.79-13.45L304.79-13.45ZM308.13-14.5L307.01-14.5Q307.91-16.5 309.86-17.65 311.8-18.8 314.36-18.8L314.36-18.8Q315.41-18.8 316.4-18.63 317.39-18.46 318.23-18.1 319.07-17.75 319.71-17.24 320.34-16.72 320.71-16.06L320.71-16.06Q319.32-16.99 317.73-17.43 316.14-17.87 314.31-17.87L314.31-17.87Q312.19-17.87 310.58-16.99 308.96-16.11 308.13-14.5L308.13-14.5ZM302.25-1.07L302.25-1.07Q304.62 0.61 307.76 1.54 310.89 2.47 314.95 2.47L314.95 2.47Q318.9 2.47 322.36 1.56 325.81 0.66 328.59-1.2L328.59-1.2 329.25-0.49Q326.1 1.64 322.62 2.51 319.15 3.39 315.34 3.39L315.34 3.39Q310.38 3.39 307.12 2.2 303.86 1 302.25-1.07ZM357.79-8.74L357.79-19.41 352.42-19.41 352.42-23.56 357.79-23.56 357.79-28.49 363.04-30.69 363.04-23.56 375.17-23.56 375.17-19.41 363.04-19.41 363.04-7.76Q363.04-5.93 364.18-5.04 365.33-4.15 367.31-4.15L367.31-4.15 374.19-4.15 374.19 0 367.31 0Q365.33 0 363.6-0.43 361.86-0.85 360.57-1.87 359.28-2.88 358.53-4.55 357.79-6.23 357.79-8.74L357.79-8.74ZM364.79-25.02L364.79-29.35 365.77-29.79 365.77-25.02 364.79-25.02ZM364.75-6.76L364.75-17.97 376.93-17.97 376.93-22.46 377.9-22.46 377.9-17.04 365.72-17.04 365.72-5.79Q364.89-6.01 364.75-6.76L364.75-6.76ZM353.88-16.77L353.88-17.7 356.81-17.7 356.81-16.77 353.88-16.77ZM357.64-2.1L357.64-2.1Q358.42-1 359.39-0.27 360.35 0.46 361.55 0.9 362.74 1.34 364.16 1.53 365.58 1.71 367.26 1.71L367.26 1.71 375.95 1.71 375.95-3.05 376.93-3.05 376.93 2.64 367.14 2.64Q365.26 2.64 363.72 2.39 362.18 2.15 361 1.6 359.81 1.05 358.97 0.13 358.13-0.78 357.64-2.1ZM383.13-11.33L383.13-11.33Q383.13-13.92 384.08-16.26 385.03-18.6 386.94-20.39 388.84-22.17 391.67-23.23 394.5-24.29 398.24-24.29L398.24-24.29Q401.75-24.29 404.51-23.35 407.27-22.41 409.2-20.63 411.13-18.85 412.14-16.27 413.16-13.7 413.16-10.4L413.16-10.4 388.47-10.4Q388.69-8.64 389.61-7.28 390.52-5.91 391.94-4.97 393.36-4.03 395.15-3.54 396.95-3.05 398.9-3.05L398.9-3.05Q400.49-3.05 402.13-3.31 403.78-3.56 405.25-4 406.71-4.44 407.86-4.99 409.01-5.54 409.62-6.13L409.62-6.13 410.54-6.13 412.84-3.64Q410.32-1.49 406.72-0.38 403.12 0.73 398.78 0.73L398.78 0.73Q394.99 0.73 392.07-0.2 389.16-1.12 387.17-2.76 385.18-4.39 384.15-6.59 383.13-8.79 383.13-11.33ZM390.82-8.69L414.82-8.69Q414.87-9.06 414.89-9.48 414.91-9.91 414.91-10.4L414.91-10.4Q414.91-12.48 414.49-14.37 414.06-16.26 413.24-17.88 412.42-19.51 411.23-20.85 410.03-22.19 408.52-23.14L408.52-23.14Q410.13-22.51 411.48-21.4 412.84-20.29 413.82-18.7 414.79-17.11 415.34-15.04 415.89-12.96 415.89-10.4L415.89-10.4Q415.89-10.21 415.88-9.91 415.87-9.62 415.84-9.25 415.82-8.89 415.78-8.51 415.74-8.13 415.7-7.76L415.7-7.76 392.62-7.76Q393.09-6.98 394.33-6.16 395.58-5.35 397.56-4.79L397.56-4.79Q396.33-4.79 395.27-5.08 394.21-5.37 393.34-5.88 392.48-6.4 391.83-7.12 391.18-7.84 390.82-8.69L390.82-8.69ZM388.62-13.45L407.52-13.45Q407.13-15.14 406.31-16.46 405.49-17.77 404.29-18.66 403.1-19.56 401.56-20.03 400.02-20.51 398.19-20.51L398.19-20.51Q396.21-20.51 394.59-19.98 392.97-19.46 391.74-18.52 390.52-17.58 389.73-16.28 388.94-14.99 388.62-13.45L388.62-13.45ZM391.96-14.5L390.84-14.5Q391.74-16.5 393.69-17.65 395.63-18.8 398.19-18.8L398.19-18.8Q399.24-18.8 400.23-18.63 401.22-18.46 402.06-18.1 402.9-17.75 403.54-17.24 404.17-16.72 404.54-16.06L404.54-16.06Q403.15-16.99 401.56-17.43 399.97-17.87 398.14-17.87L398.14-17.87Q396.02-17.87 394.41-16.99 392.79-16.11 391.96-14.5L391.96-14.5ZM386.08-1.07L386.08-1.07Q388.45 0.61 391.59 1.54 394.72 2.47 398.78 2.47L398.78 2.47Q402.73 2.47 406.19 1.56 409.64 0.66 412.42-1.2L412.42-1.2 413.08-0.49Q409.93 1.64 406.45 2.51 402.98 3.39 399.17 3.39L399.17 3.39Q394.21 3.39 390.95 2.2 387.69 1 386.08-1.07ZM421.38 0L421.38-3.66 426.75-3.66 426.75-30.4 421.38-30.4 421.38-34.06 432-34.06 432-3.66 437.37-3.66 437.37 0 421.38 0ZM433.71-5.13L433.71-32.81 434.69-32.81 434.69-5.13 433.71-5.13ZM422.85-27.76L422.85-28.69 425.73-28.69 425.73-27.76 422.85-27.76ZM422.85 1.71L439.13 1.71 439.13-2.29 440.11-2.29 440.11 2.64 422.85 2.64 422.85 1.71ZM444.62-11.33L444.62-11.33Q444.62-13.92 445.57-16.26 446.53-18.6 448.43-20.39 450.33-22.17 453.17-23.23 456-24.29 459.73-24.29L459.73-24.29Q463.25-24.29 466.01-23.35 468.77-22.41 470.7-20.63 472.62-18.85 473.64-16.27 474.65-13.7 474.65-10.4L474.65-10.4 449.97-10.4Q450.19-8.64 451.1-7.28 452.02-5.91 453.43-4.97 454.85-4.03 456.64-3.54 458.44-3.05 460.39-3.05L460.39-3.05Q461.98-3.05 463.63-3.31 465.28-3.56 466.74-4 468.2-4.44 469.35-4.99 470.5-5.54 471.11-6.13L471.11-6.13 472.04-6.13 474.33-3.64Q471.82-1.49 468.22-0.38 464.62 0.73 460.27 0.73L460.27 0.73Q456.49 0.73 453.57-0.2 450.65-1.12 448.66-2.76 446.67-4.39 445.65-6.59 444.62-8.79 444.62-11.33ZM452.31-8.69L476.31-8.69Q476.36-9.06 476.38-9.48 476.41-9.91 476.41-10.4L476.41-10.4Q476.41-12.48 475.98-14.37 475.55-16.26 474.74-17.88 473.92-19.51 472.72-20.85 471.53-22.19 470.01-23.14L470.01-23.14Q471.62-22.51 472.98-21.4 474.33-20.29 475.31-18.7 476.29-17.11 476.84-15.04 477.38-12.96 477.38-10.4L477.38-10.4Q477.38-10.21 477.37-9.91 477.36-9.62 477.34-9.25 477.31-8.89 477.27-8.51 477.24-8.13 477.19-7.76L477.19-7.76 454.12-7.76Q454.58-6.98 455.83-6.16 457.07-5.35 459.05-4.79L459.05-4.79Q457.83-4.79 456.77-5.08 455.7-5.37 454.84-5.88 453.97-6.4 453.32-7.12 452.68-7.84 452.31-8.69L452.31-8.69ZM450.11-13.45L469.01-13.45Q468.62-15.14 467.8-16.46 466.98-17.77 465.79-18.66 464.59-19.56 463.05-20.03 461.52-20.51 459.68-20.51L459.68-20.51Q457.71-20.51 456.08-19.98 454.46-19.46 453.24-18.52 452.02-17.58 451.22-16.28 450.43-14.99 450.11-13.45L450.11-13.45ZM453.46-14.5L452.34-14.5Q453.24-16.5 455.18-17.65 457.12-18.8 459.68-18.8L459.68-18.8Q460.73-18.8 461.72-18.63 462.71-18.46 463.55-18.1 464.4-17.75 465.03-17.24 465.67-16.72 466.03-16.06L466.03-16.06Q464.64-16.99 463.05-17.43 461.47-17.87 459.64-17.87L459.64-17.87Q457.51-17.87 455.9-16.99 454.29-16.11 453.46-14.5L453.46-14.5ZM447.57-1.07L447.57-1.07Q449.94 0.61 453.08 1.54 456.22 2.47 460.27 2.47L460.27 2.47Q464.23 2.47 467.68 1.56 471.13 0.66 473.92-1.2L473.92-1.2 474.58-0.49Q471.43 1.64 467.95 2.51 464.47 3.39 460.66 3.39L460.66 3.39Q455.7 3.39 452.45 2.2 449.19 1 447.57-1.07ZM483.36 0L483.36-3.66 488.73-3.66 488.73-16.72 483.36-16.72 483.36-20.39 488.73-20.39 488.73-23.93Q488.73-26.27 489.5-28.22 490.27-30.18 491.69-31.58 493.1-32.98 495.13-33.76 497.16-34.55 499.7-34.55L499.7-34.55Q501.92-34.55 503.63-34 505.34-33.45 506.54-32.48 507.75-31.52 508.49-30.2 509.22-28.88 509.51-27.32L509.51-27.32 504.48-27.32Q504.26-27.83 503.92-28.33 503.58-28.83 503.02-29.24 502.46-29.64 501.65-29.9 500.84-30.15 499.7-30.15L499.7-30.15Q498.6-30.15 497.56-29.8 496.52-29.44 495.73-28.72 494.94-28 494.46-26.9 493.98-25.81 493.98-24.34L493.98-24.34 493.98-20.39 505.29-20.39 505.29-16.72 493.98-16.72 493.98-3.66 502.28-3.66 502.28 0 483.36 0ZM505.95-24.68L505.95-25.61 511.27-25.61 511.27-25.93Q511.27-27.08 511.02-28.14 510.78-29.2 510.37-30.15 509.95-31.1 509.4-31.91 508.85-32.71 508.24-33.35L508.24-33.35Q509.22-32.86 509.97-31.98 510.73-31.1 511.23-30.09 511.73-29.08 511.99-28.08 512.25-27.08 512.25-26.34L512.25-26.34 512.25-24.68 505.95-24.68ZM495.69-22.09L495.69-22.63Q495.69-24.37 496.03-25.51 496.38-26.66 496.96-27.33 497.55-28 498.32-28.27 499.09-28.54 499.94-28.54L499.94-28.54Q500.55-28.54 501.05-28.39 501.55-28.25 501.92-28.03 502.28-27.81 502.53-27.55 502.77-27.29 502.89-27.05L502.89-27.05Q501.99-27.51 501.14-27.6 500.28-27.69 499.89-27.69L499.89-27.69Q499.28-27.69 498.71-27.49 498.13-27.29 497.68-26.75 497.23-26.2 496.95-25.21 496.67-24.22 496.67-22.61L496.67-22.61 496.67-22.09 495.69-22.09ZM495.69-5.13L495.69-15.01 507.05-15.01 507.05-19.02 508.02-19.02 508.02-14.09 496.67-14.09 496.67-5.13 495.69-5.13ZM484.83-14.09L484.83-15.01 487.76-15.01 487.76-14.09 484.83-14.09ZM484.83 1.71L504.04 1.71 504.04-2.29 505.02-2.29 505.02 2.64 484.83 2.64 484.83 1.71ZM514.56-11.4L514.56-11.4Q514.56-14.06 515.71-16.42 516.86-18.77 518.92-20.52 520.98-22.27 523.86-23.28 526.74-24.29 530.19-24.29L530.19-24.29Q533.8-24.29 536.64-23.33 539.49-22.36 541.45-20.65 543.42-18.95 544.46-16.6 545.49-14.26 545.49-11.5L545.49-11.5Q545.49-8.84 544.36-6.59 543.22-4.35 541.14-2.72 539.05-1.1 536.13-0.18 533.21 0.73 529.63 0.73L529.63 0.73Q526.23 0.73 523.46-0.28 520.69-1.29 518.71-2.98 516.73-4.66 515.65-6.85 514.56-9.03 514.56-11.4ZM518.4-1.12L518.4-1.12Q520.76 0.59 523.63 1.51 526.5 2.44 530.11 2.44L530.11 2.44Q533.48 2.44 536.58 1.53 539.68 0.61 542.05-1.17 544.42-2.95 545.84-5.55 547.25-8.15 547.25-11.5L547.25-11.5Q547.25-13.13 546.8-14.81 546.35-16.48 545.53-18.02 544.71-19.56 543.54-20.89 542.37-22.22 540.93-23.14L540.93-23.14Q542.57-22.41 543.92-21.22 545.28-20.02 546.23-18.49 547.18-16.97 547.7-15.19 548.23-13.4 548.23-11.5L548.23-11.5Q548.23-9.11 547.55-7.07 546.86-5.03 545.65-3.38 544.44-1.73 542.77-0.46 541.1 0.81 539.1 1.65 537.1 2.49 534.84 2.93 532.58 3.37 530.24 3.37L530.24 3.37Q528.28 3.37 526.5 3.06 524.72 2.76 523.19 2.19 521.67 1.61 520.45 0.78 519.23-0.05 518.4-1.12ZM519.98-11.5L519.98-11.5Q519.98-9.62 520.7-8.07 521.42-6.52 522.74-5.41 524.06-4.3 525.9-3.69 527.75-3.08 529.99-3.08L529.99-3.08Q532.26-3.08 534.12-3.7 535.97-4.32 537.32-5.43 538.66-6.54 539.39-8.09 540.12-9.64 540.12-11.5L540.12-11.5Q540.12-13.33 539.39-14.95 538.66-16.58 537.34-17.81 536.02-19.04 534.18-19.76 532.34-20.48 530.11-20.48L530.11-20.48Q527.79-20.48 525.93-19.79 524.06-19.09 522.74-17.88 521.42-16.67 520.7-15.04 519.98-13.4 519.98-11.5ZM521.69-11.4L521.69-11.4Q521.69-12.94 522.3-14.29 522.91-15.65 524.02-16.64 525.13-17.63 526.68-18.2 528.23-18.77 530.11-18.77L530.11-18.77Q531.31-18.77 532.43-18.52 533.56-18.26 534.51-17.77 535.46-17.29 536.19-16.59 536.93-15.89 537.36-15.01L537.36-15.01Q535.75-16.48 534.01-17.16 532.26-17.85 530.07-17.85L530.07-17.85Q528.48-17.85 527.14-17.33 525.79-16.82 524.79-15.94 523.79-15.06 523.23-13.89 522.67-12.72 522.67-11.4L522.67-11.4Q522.67-10.3 522.94-9.35 523.2-8.4 523.85-7.58 524.5-6.76 525.57-6.1 526.65-5.44 528.26-4.93L528.26-4.93Q526.79-5.03 525.59-5.55 524.38-6.08 523.51-6.93 522.64-7.79 522.17-8.94 521.69-10.08 521.69-11.4ZM553.84-11.69L553.84-11.69Q553.84-13.96 554.79-16.21 555.75-18.46 557.61-20.25 559.48-22.05 562.24-23.17 565-24.29 568.59-24.29L568.59-24.29Q569.74-24.29 571.04-24.12 572.35-23.95 573.65-23.56 574.96-23.17 576.21-22.52 577.45-21.88 578.48-20.95L578.48-20.95 578.48-23.56 588.97-23.56 588.97-19.41 583.6-19.41 583.6-3.66 588.97-3.66 588.97 0 578.48 0 578.48-3.17Q577.52-2.22 576.31-1.49 575.11-0.76 573.75-0.27 572.4 0.22 570.94 0.48 569.49 0.73 568.05 0.73L568.05 0.73Q564.54 0.73 561.87-0.27 559.21-1.27 557.43-2.97 555.65-4.66 554.75-6.92 553.84-9.18 553.84-11.69ZM585.36-5.13L585.36-17.7 590.73-17.7 590.73-21.7 591.71-21.7 591.71-16.77 586.34-16.77 586.34-5.13 585.36-5.13ZM559.14-11.89L559.14-11.89Q559.14-9.86 559.86-8.23 560.58-6.59 561.83-5.44 563.07-4.3 564.78-3.66 566.49-3.03 568.47-3.03L568.47-3.03Q569.61-3.03 570.8-3.26 571.98-3.49 573.09-3.97 574.2-4.44 575.19-5.16 576.18-5.88 576.9-6.87 577.62-7.86 578.05-9.13 578.48-10.4 578.48-11.96L578.48-11.96Q578.48-13.7 577.67-15.25 576.86-16.8 575.51-17.97 574.15-19.14 572.35-19.82 570.54-20.51 568.54-20.51L568.54-20.51Q566.54-20.51 564.82-19.9 563.09-19.29 561.84-18.16 560.58-17.04 559.86-15.44 559.14-13.84 559.14-11.89ZM560.82-11.77L560.82-11.77Q560.82-13.31 561.4-14.59 561.97-15.87 563-16.81 564.02-17.75 565.44-18.27 566.85-18.8 568.54-18.8L568.54-18.8Q569.81-18.8 570.83-18.52 571.86-18.24 572.62-17.83 573.37-17.43 573.86-17 574.35-16.58 574.54-16.26L574.54-16.26Q573.23-16.99 571.84-17.43 570.44-17.87 568.54-17.87L568.54-17.87Q567-17.87 565.77-17.37 564.54-16.87 563.66-16.02 562.78-15.16 562.3-14.04 561.83-12.92 561.83-11.67L561.83-11.67Q561.83-10.5 562.09-9.47 562.36-8.45 562.96-7.58 563.56-6.71 564.52-5.99 565.49-5.27 566.85-4.74L566.85-4.74Q565.32-5 564.18-5.65 563.05-6.3 562.3-7.23 561.56-8.15 561.19-9.31 560.82-10.47 560.82-11.77ZM579.94 1.71L590.73 1.71 590.73-2.29 591.71-2.29 591.71 2.64 579.94 2.64 579.94 1.71ZM556.99-1.05L556.99-1.05Q557.99-0.24 559.26 0.4 560.53 1.05 561.97 1.5 563.41 1.95 564.96 2.2 566.51 2.44 568.08 2.44L568.08 2.44Q570.79 2.44 573.14 1.77 575.5 1.1 577.33-0.1L577.33-0.1 577.33 1.03Q575.5 2.12 573.09 2.75 570.69 3.37 568.1 3.37L568.1 3.37Q566.32 3.37 564.61 3.09 562.9 2.81 561.43 2.25 559.97 1.68 558.82 0.85 557.67 0.02 556.99-1.05ZM598.59 0L598.59-3.66 603.96-3.66 603.96-19.41 598.59-19.41 598.59-23.56 609.21-23.56 609.21-19.87Q609.97-20.8 611.03-21.61 612.09-22.41 613.41-23.01 614.73-23.61 616.27-23.95 617.8-24.29 619.49-24.29L619.49-24.29Q622.03-24.29 624.1-23.57 626.18-22.85 627.64-21.35 629.11-19.85 629.9-17.57 630.69-15.28 630.69-12.16L630.69-12.16 630.69-3.66 636.07-3.66 636.07 0 621.3 0 621.3-3.66 625.45-3.66 625.45-10.08Q625.45-12.06 625.26-13.61 625.08-15.16 624.74-16.04L624.74-16.04Q624.3-17.16 623.63-17.94 622.96-18.73 622.11-19.21 621.27-19.7 620.27-19.92 619.27-20.14 618.15-20.14L618.15-20.14Q616.95-20.14 615.67-19.7 614.39-19.26 613.18-18.47 611.97-17.68 610.93-16.6 609.89-15.53 609.21-14.28L609.21-14.28 609.21-3.66 613.36-3.66 613.36 0 598.59 0ZM632.45-5.13L632.45-11.99Q632.45-14.14 632.12-15.98 631.79-17.82 631.13-19.3 630.48-20.78 629.51-21.85 628.55-22.92 627.28-23.56L627.28-23.56Q628.94-23.14 630.11-22.16 631.28-21.17 632.01-19.65 632.75-18.14 633.09-16.16 633.43-14.18 633.43-11.82L633.43-11.82 633.43-5.13 632.45-5.13ZM610.97-5.13L610.97-13.67Q611.58-14.75 612.42-15.63 613.26-16.5 614.25-17.13 615.24-17.75 616.33-18.09 617.41-18.43 618.49-18.43L618.49-18.43Q620.17-18.43 621.22-17.8 622.27-17.16 622.76-16.19L622.76-16.19Q622-16.75 620.99-17.14 619.98-17.53 618.44-17.53L618.44-17.53Q617.49-17.53 616.51-17.18 615.53-16.82 614.65-16.24 613.78-15.65 613.07-14.89 612.36-14.14 611.94-13.35L611.94-13.35 611.94-5.13 610.97-5.13ZM600.06-16.77L600.06-17.7 602.94-17.7 602.94-16.77 600.06-16.77ZM622.76 1.71L637.82 1.71 637.82-2.29 638.8-2.29 638.8 2.64 622.76 2.64 622.76 1.71ZM600.06 1.71L615.12 1.71 615.12-2.29 616.1-2.29 616.1 2.64 600.06 2.64 600.06 1.71ZM642.53-11.33L642.53-11.33Q642.53-13.92 643.49-16.26 644.44-18.6 646.34-20.39 648.25-22.17 651.08-23.23 653.91-24.29 657.65-24.29L657.65-24.29Q661.16-24.29 663.92-23.35 666.68-22.41 668.61-20.63 670.54-18.85 671.55-16.27 672.56-13.7 672.56-10.4L672.56-10.4 647.88-10.4Q648.1-8.64 649.02-7.28 649.93-5.91 651.35-4.97 652.76-4.03 654.56-3.54 656.35-3.05 658.3-3.05L658.3-3.05Q659.89-3.05 661.54-3.31 663.19-3.56 664.65-4 666.12-4.44 667.26-4.99 668.41-5.54 669.02-6.13L669.02-6.13 669.95-6.13 672.25-3.64Q669.73-1.49 666.13-0.38 662.53 0.73 658.18 0.73L658.18 0.73Q654.4 0.73 651.48-0.2 648.56-1.12 646.57-2.76 644.58-4.39 643.56-6.59 642.53-8.79 642.53-11.33ZM650.22-8.69L674.22-8.69Q674.27-9.06 674.3-9.48 674.32-9.91 674.32-10.4L674.32-10.4Q674.32-12.48 673.89-14.37 673.47-16.26 672.65-17.88 671.83-19.51 670.63-20.85 669.44-22.19 667.92-23.14L667.92-23.14Q669.54-22.51 670.89-21.4 672.25-20.29 673.22-18.7 674.2-17.11 674.75-15.04 675.3-12.96 675.3-10.4L675.3-10.4Q675.3-10.21 675.28-9.91 675.27-9.62 675.25-9.25 675.22-8.89 675.19-8.51 675.15-8.13 675.1-7.76L675.1-7.76 652.03-7.76Q652.49-6.98 653.74-6.16 654.98-5.35 656.96-4.79L656.96-4.79Q655.74-4.79 654.68-5.08 653.62-5.37 652.75-5.88 651.88-6.4 651.24-7.12 650.59-7.84 650.22-8.69L650.22-8.69ZM648.03-13.45L666.92-13.45Q666.53-15.14 665.71-16.46 664.9-17.77 663.7-18.66 662.5-19.56 660.97-20.03 659.43-20.51 657.6-20.51L657.6-20.51Q655.62-20.51 654-19.98 652.37-19.46 651.15-18.52 649.93-17.58 649.14-16.28 648.34-14.99 648.03-13.45L648.03-13.45ZM651.37-14.5L650.25-14.5Q651.15-16.5 653.09-17.65 655.03-18.8 657.6-18.8L657.6-18.8Q658.65-18.8 659.64-18.63 660.62-18.46 661.47-18.1 662.31-17.75 662.94-17.24 663.58-16.72 663.94-16.06L663.94-16.06Q662.55-16.99 660.97-17.43 659.38-17.87 657.55-17.87L657.55-17.87Q655.42-17.87 653.81-16.99 652.2-16.11 651.37-14.5L651.37-14.5ZM645.49-1.07L645.49-1.07Q647.86 0.61 650.99 1.54 654.13 2.47 658.18 2.47L658.18 2.47Q662.14 2.47 665.59 1.56 669.05 0.66 671.83-1.2L671.83-1.2 672.49-0.49Q669.34 1.64 665.86 2.51 662.38 3.39 658.57 3.39L658.57 3.39Q653.62 3.39 650.36 2.2 647.1 1 645.49-1.07Z" opacity="1" transform="matrix(1,0,0,1,0,0)" fill="#ffffff" class="undefined-text-1" data-fill-palette-color="secondary" id="text-1"></path></svg></g></svg></g></svg></g></svg></g><g transform="matrix(1,0,0,1,121.51164873070569,0)"><svg viewBox="0 0 152.49670253858866 152.49670253858866" height="152.49670253858866" width="152.49670253858866"><g><svg></svg></g><g id="icon-0"><svg viewBox="0 0 152.49670253858866 152.49670253858866" height="152.49670253858866" width="152.49670253858866"><g><path xmlns="http://www.w3.org/2000/svg" d="M45.749 152.497c-25.266 0-45.749-20.483-45.749-45.749v-60.999c0-25.266 20.483-45.749 45.749-45.749h60.999c25.266 0 45.749 20.483 45.749 45.749v60.999c0 25.266-20.483 45.749-45.749 45.749z" fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal" data-fill-palette-color="accent"></path></g><g transform="matrix(1,0,0,1,49.17240612468777,30.499340507717733)"><svg viewBox="0 0 54.15189028921312 91.4980215231532" height="91.4980215231532" width="54.15189028921312"><g><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0" y="0" viewBox="21.300003051757812 0.5 58 98" enable-background="new 0 0 100 100" xml:space="preserve" height="91.4980215231532" width="54.15189028921312" class="icon-s-0" data-fill-palette-color="quaternary" id="s-0"><path fill="#444444" d="M69.3 0.5h-38c-5.5 0-10 4.5-10 10v78c0 5.5 4.5 10 10 10h38c5.5 0 10-4.5 10-10v-78C79.3 5 74.8 0.5 69.3 0.5zM50 93.2c-2.7 0-5-2.2-5-5 0-2.7 2.2-5 5-5s5 2.2 5 5C55 91 52.7 93.2 50 93.2zM71.3 79.5h-42v-66h42V79.5z" data-fill-palette-color="quaternary"></path></svg></g></svg></g></svg></g></svg></g><g></g></svg></g><defs></defs></svg><rect width="347.5817888786384" height="247.2" fill="none" stroke="none" visibility="hidden"></rect></g></svg></g></svg>
            </div>
            <nav id="desktop">
                <ul class="nav-list">
                    <li class="nav-list-item"><a href="index.php" class="color-dark-effect color-hover-dark">Acasa</a></li>
                    <li class="nav-list-item"><a href="produse.php" class="color-dark-effect color-hover-dark">Produse</a></li>
                    <li class="nav-list-item"><a href="contact.php" class="color-dark-effect color-hover-dark">Contact</a></li>
                    <?php if($_SESSION['active'] == true && $_SESSION['nume'] == "Admin") { ?>
                        <li class="nav-list-item"><a href="edit.php" class="color-dark-effect color-hover-dark">Modificare</a></li>
                    <?php } ?>
                    <li class="nav-list-item"><button class="search-btn"><i class="bi bi-search color-dark-effect"></i></button></li>
                </ul>
            </nav>
            <nav id="mobile">
                <ul id="menu-mobile" class="nav-list-mobile">
                    <li class="nav-list-item"><button class="btn close-btn" id="close-button"><i class="bi bi-x-lg color-dark-effect"></i></button></li>
                    <li class="nav-list-item"><a href="index.html" class="color-dark-effect color-hover-dark">Acasa</a></li>
                    <li class="nav-list-item"><a href="produse.html" class="color-dark-effect color-hover-dark">Produse</a></li>
                    <li class="nav-list-item"><a href="contact.html" class="color-dark-effect color-hover-dark">Contact</a></li>
                </ul>
            </nav>
            <ul class="nav-list">
                <?php if(isset($_SESSION)) {
                    if($_SESSION['active'] == true) { ?>
                        <li class="nav-list-item dropdown"><a href="cont.php?id=<?php echo $_SESSION['id_user']; ?>" class="dropbtn"><i class="bi bi-person color-dark-effect color-hover-dark"><?php echo $_SESSION['nume']; ?></i></a>
                            <div class="dropdown-content">
                                <a href="cont.php?id=<?php echo $_SESSION['id_user']; ?>">Cont</a>
                                <a href="logout.php">Delogare</a>
                            </div>
                        </li>
                    <?php }
                    else { ?>
                        <li class="nav-list-item"><a href="login.php"><i class="bi bi-person-plus color-dark-effect color-hover-dark"></i></a></li>
                    <?php }
                } ?>
                <li class="nav-list-item burger-menu"><button id="menu-btn" class="burger-menu-btn"><i class="bi bi-list"></i></button></li>
            </ul>
        </div>
    </header>
    <main class="container">