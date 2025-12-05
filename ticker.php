<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Updates - Blood Bank</title>
    <style>
        /* Make sure the layout is responsive and good looking */
        @media screen and (max-width: 768px) {
            .news {
                margin-left: auto;
                margin-right: auto;
                margin-top: 20px;
            }
            .text1 {
                box-shadow: none !important;
                position: relative;
                margin-left: auto;
                margin-right: auto;
                font-size: 14px;
            }
        }

        /* Blue background for the news section */
        .blue {
            background: #347fd0;
        }

        /* Styling for the news section container */
        .news {
            box-shadow: inset 0 -15px 30px rgba(10, 4, 60, 0.4), 0 5px 10px rgba(10, 20, 100, 0.5);
            width: 100%;
            height: 60px;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 4px;
            padding: 5px;
            -webkit-user-select: none;
            position: relative;
        }

        /* Styling for the 'Latest Updates' label */
        .news span {
            float: left;
            color: #fff;
            padding: 12px;
            position: relative;
            top: 1%;
            font: 16px 'Raleway', Helvetica, Arial, sans-serif;
            font-weight: bold;
            cursor: pointer;
        }

        /* Marquee text styling */
        .text1 {
            box-shadow: none !important;
            position: relative;
            width: 90%;
            font-size: 16px;
            color: white;
            padding: 10px;
        }

        /* Specific background for the 'Latest Updates' span */
        .news span.latest {
            background-color: #F60F0F;
            width: auto;
            height: 50px;
            padding: 12px;
        }
    </style>
</head>
<body>

<div class="news blue">
    <!-- Latest Updates label -->
    <span class="latest">Latest Updates</span>

    <!-- News content inside marquee -->
    <span class="text1">
        <marquee>Exciting News blood donation camp coming soon in Satara! Join us at the <b>Blood Donation Camp on 05/05/2024</b> at the Shahu Stadium. Your participation can save lives!</marquee>
    </span>
</div>

</body>
</html>
