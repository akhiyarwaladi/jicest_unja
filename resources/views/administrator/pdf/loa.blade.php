<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Letter Of Acceptance</title>
</head>

<body>
    <div class="row justify-content-center">
        <div style="width:100%">
            <div class="row justify-content-center" style="margin:0px 5px">
                <table>
                    <tr style="margin:0; padding:0">
                        <td style="width:20%">
                            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('assets/img/unja-3d.jpeg'))) }}" width="100px" alt="">
                        </td>
                        <td style="width:80%">
                            <h4 style="text-align: center; font-size:18px; margin:0; padding:0">
                                JAMBI INTERNATIONAL CONFERENCE ON ENGINERING SCIENCE AND TECNNOLOGY <br>(JICEST 2025)
                            </h4>
                            <h6 style="text-align: center; font-size:16px; margin:0; padding:0">
                                FACULTY OF SCIENCE AND
                                TECHNOLOGY <br>
                                JAMBI UNIVERSITY</h6>
                            <p style="text-align: center; font-size:14px; margin:0; padding:0">
                                Email : jicest@unja.ac.id; Website : https://jicest.unja.ac.id
                            </p>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr style="height:2px; background-color:black">
                        </td>
                    </tr>

                    <!--<tr style="width: 100%;">-->
                    <!--    <td colspan="2"></td>-->
                    <!--    <td style="width:100%">-->
                    <!--        <p style="text-align: end; font-size:14px; width: 100%">{{ date('d F Y') }}</p>-->
                    <!--    </td>-->
                    <!--</tr>-->
                </table>
                <div style="width: 100%; text-align: right; font-size: 14px;">
                    {{ date('d F Y') }}
                </div>
                <p style="margin:0px; padding:0px;font-size: 14px">Dear :</p>
                <div class="div" style="margin:0px; padding:0px; width:200px;font-size: 14px">
                    <strong>{{ $full_name }}</strong> <br>
                    <strong>{{ $institution }}</strong>
                </div>
                <br>
                <br>
                <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px">Thank you for your interest in
                    <strong>The 2nd
                        JAMBI INTERNATIONAL CONFERENCE ON ENGINERING SCIENCE AND TECNNOLOGY (JICEST 2025)</strong> and submitting
                    your Abstract entitled:
                </p>

                <p style="margin:20px 0px 0px 0px; padding:0px;font-size: 14px; text-align:center">
                    <strong>{{ $abstractTitle }}</strong>
                </p>

                <p style="margin:20px 0px 0px 0px; padding:0px;font-size: 14px">It is our pleasure to inform you that
                    your paper
                    based on your Extended Abstract has been accepted for
                    presentation at the conference, which will be taking place at Jambi on 28 November 2025.
                    We hereby have the honor and pleasure of inviting you to present your paper in the conference.
                </p>
                <p style="margin:20px 0px 0px 0px; padding:0px;font-size: 14px">Please do not hesitate to contact us if
                    you need
                    further information. <br>
                    Looking forward to your participation in this conference.
                </p>
            </div>
            <table style="width:100%">
                <tr>
                    <td width="70%"></td>
                    <td width="30%">
                        <p style="margin:50px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end">
                            Warm Regards, <br>
                            Chairman of JICEST 2025 <br>
                        </p>
                        <div class="parent" style="position:relative;">
                                <div class="parent" style="position: relative;top: 10px;left: 0;">
                                    <img class="image1" style="position: relative;top: 0;left: 0;z-index: 2;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/stpml.png'))) }}" width="100px" />
                                    <img class="image2" style="position: absolute; left: 40px; top: -40px; transform: scale(2);z-index: 3;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/tdtd.png'))) }}" width="100px" />
                                </div>
                            </div>
                           <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end; white-space: nowrap;">
                                Yudi Arista Yulanda, S.T., M.T.
                            </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
