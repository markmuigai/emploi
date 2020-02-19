<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <meta name="format-detection" content="telephone=no" />

    <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
	https://github.com/konsav/email-templates/  -->

    <style>
        /* Reset styles */

        body {
            margin: 0;
            padding: 0;
            min-width: 100%;
            width: 100% !important;
            height: 100% !important;
        }

        body,
        table,
        td,
        div,
        p,
        a {
            -webkit-font-smoothing: antialiased;
            text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            line-height: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse !important;
            border-spacing: 0;
        }

        img {
            border: 0;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        #outlook a {
            padding: 0;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        /* Rounded corners for advanced mail clients only */

        @media all and (min-width: 560px) {
            .container {
                border-radius: 8px;
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                -khtml-border-radius: 8px;
            }
        }

        /* Set color for auto links (addresses, dates, etc.) */
        .tr {
            margin-bottom: 0.5em;
        }


        a,
        a:hover {
            color: #500095;
            ;
        }

        .footer a,
        .footer a:hover {
            color: #999999;
        }
    </style>

    <!-- MESSAGE SUBJECT -->
    <title>{{ $subject }}</title>

</head>

<!-- BODY -->
<!-- Set message background color (twice) and text color (twice) -->

<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
	background-color: #F0F0F0;
	color: #000000;" bgcolor="#F0F0F0" text="#000000">

    <!-- SECTION / BACKGROUND -->
    <!-- Set message background color one again -->
    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
        <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#F0F0F0">

                <!-- WRAPPER -->
                <!-- Set wrapper width (twice) -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;" class="wrapper">

                    <tr style="background-color:  #500095;">
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
			padding-top: 20px;
			padding-bottom: 20px;">

                            <!-- PREHEADER -->
                            <!-- Set text color to background color -->
                            <div style="display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
			color: #F0F0F0;" class="preheader">
                                {{ $caption }}
                            </div>


                            <a target="_blank" style="text-decoration: none;" href="https://emploi.co?source=email"><img border="0" vspace="0" hspace="0" src="{{ asset('images/logo.png') }}" width="100" height="30" alt="Logo" title="Logo"
                                  style="
				color: #000000;
				font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>

                        </td>
                    </tr>

                    <!-- End of WRAPPER -->
                </table>

                <!-- WRAPPER / CONTEINER -->
                <!-- Set conteiner background color -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
	max-width: 560px;" class="container">

                    <!-- HEADER -->
                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
			padding-top: 25px;
			color: #000000;
			font-family: sans-serif;" class="header">
                            {{ $subject }}
                        </td>
                    </tr>

                    <!-- SUBHEADER -->
                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif") -->
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-bottom: 3px; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 18px; font-weight: 300; line-height: 150%;
			padding-top: 5px;
			color: #000000;
			font-family: sans-serif;" class="subheader">
                            {{ $caption }}
                        </td>
                    </tr>

                    <?php
                        if(!isset($banner) || $banner == '/images/email-banner.jpg')
                        {
                            $banner = rand(0,5);
                            $banner = 0 ? 'email-banner.jpg' : 'email-banner-'.$banner.'.jpg';
                            $banner = '/images/'.$banner;
                        }
                        
                    ?>

                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;			padding-top: 20px;" class="hero"> 
                            <a target="_blank" style="text-decoration: none;" href="{{ isset($url) && $url != false ? $url : url('/') }}"><img
                                  border="0" vspace="0" hspace="0" src="{{ asset($banner) }}" alt="Featured Image" title="Emploi" width="560"
                                  style="	width: 100%;			max-width: 560px;			color: #000000; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></a>
                        </td>
                    </tr>

                    <!-- PARAGRAPH -->
                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                            padding-top: 25px;
                            color: #000000;
                            font-family: sans-serif;" class="paragraph">
                            Hello<strong>{{ ' '.$name }}</strong>,
                            <br>
                            <?php echo $contents; ?>

                            <!-- End of WRAPPER -->
                </table>

                <!-- WRAPPER -->
                <!-- Set wrapper width (twice) -->
                <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
						max-width: 560px;" class="wrapper">

                    <!-- SOCIAL NETWORKS -->
                    <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 -->
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
							padding-top: 25px;" class="social-icons">
                            <table width="256" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse: collapse; border-spacing: 0; padding: 0;">
                                <tr>

                                    <!-- ICON 1 -->
                                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 5px; padding-right: 5px; border-collapse: collapse; border-spacing: 0;">
                                        <a target="_blank" href="https://facebook.com/emploi.co" style="text-decoration: none;">
                                            <img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;					color: #000000;" alt="F"
                                              title="Facebook" width="44" height="44" src="{{ asset('images/facebook.png') }}">
                                        </a>
                                    </td>

                                    <!-- ICON 2 -->
                                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 5px; padding-right: 5px; border-collapse: collapse; border-spacing: 0;">
                                        <a target="_blank" href="https://www.linkedin.com/company/emploike" style="text-decoration: none;">
                                            <img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;					color: #000000;" alt="F"
                                              title="LinkedIn" width="44" height="44" src="{{ asset('images/linkedin1.png') }}">
                                        </a>
                                    </td>

                                    <!-- ICON 3 -->
                                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 5px; padding-right: 5px; border-collapse: collapse; border-spacing: 0;">
                                        <a target="_blank" href="https://twitter.com/emploike" style="text-decoration: none;">
                                            <img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;                 color: #000000;" alt="F"
                                              title="LinkedIn" width="44" height="44" src="{{ asset('images/twitter.png') }}">
                                        </a>
                                    </td>

                                    <!-- ICON 4 -->
                                    <td align="center" valign="middle" style="margin: 0; padding: 0; padding-left: 5px; padding-right: 5px; border-collapse: collapse; border-spacing: 0;">
                                        <a target="_blank" href="https://instagram.com/emploi.co" style="text-decoration: none;">
                                            <img border="0" vspace="0" hspace="0" style="padding: 0; margin: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: inline-block;                 color: #000000;" alt="F"
                                              title="LinkedIn" width="44" height="44" src="{{ asset('images/instagram.png') }}">
                                        </a>
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
                    <tr>
                        <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
							padding-top: 20px;
							padding-bottom: 20px;
							color: #999999;
							font-family: sans-serif;" class="footer">
                            <?php
                            $arr = array();
                            $arr[] = "Emploi's philosophy is to create a single sourcing point for players, with enough tools to help them find each other.";
                            $arr[] = "Emploi is an online placement platform that does it right and does it fast.";

                            print $arr[rand(0,1)];

                            ?>
                            

                            

                            <br>

                            <a href="{{ url('/?source=email') }}" style="text-align: center;">Emploi</a>

                        </td>
                    </tr>

                    <!-- End of WRAPPER -->
                </table>

                <!-- End of SECTION / BACKGROUND -->
            </td>
        </tr>
    </table>

</body>

</html>