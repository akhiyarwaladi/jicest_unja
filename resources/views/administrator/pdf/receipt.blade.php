<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Receipt</title>
</head>

<body>
    <div class="row justify-content-center">
        <div style="width:100%">
            <div class="row justify-content-center" style="margin:0px 5px">
                <table>
                    <tr style="margin:0; padding:0">
                        <td style="width:20%">
                            <img src="{{ url('assets/img/unja-3d.jpeg') }}" width="100px" alt="">
                        </td>
                        <td style="width:80%">
                            <h4 style="text-align: center; font-size:18px; margin:0; padding:0">
                                JAMBl INTERNATIONAL CONFERENCE ON ENGINERING SCIENCE AND TECNNOLOGY <br>(JICEST 2025)
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
                </table>
                <h4 style="text-align: center">RECEIPT</h4>
                <table style="width:100%">
                    <tr>
                        <td>
                            No
                        </td>
                        <td>: {{ $receipt_no }}</td>
                    </tr>
                    <tr>
                        <td>Received From</td>
                        <td>: {{ $full_name }}</td>
                    </tr>
                    <tr>
                        <td>
                            Amount Paid
                        </td>
                        <td>
                            : {{ $fee }}
                        </td>
                    </tr>
                    <tr>
                        <td>For the Payment of</td>
                        <td>: {{ $payment_for }}</td>
                    </tr>
                </table>
                <table style="width:100%">
                    <tr>
                        <td width="70%"></td>
                        <td width="30%">
                            <p style="margin:50px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end">
                                {{ date('d F Y') }} <br>
                                Signature of Receiver<br>
                            </p>
                            <div class="parent">
                                <div class="parent" style="position: relative;top: 10px;left: 0;">
                                    <img class="image1" style="position: relative;top: 0;left: 0;z-index: 2;" src="{{ url('assets/img/stpml.png') }}" width="100px" />
                                    <img class="image2" style="position: absolute; left: 40px; top: -40px; transform: scale(2);z-index: 3;" src="{{ url('assets/img/tdtd.png') }}" width="100px" />
                                </div>
                            </div>
                            <p style="margin:10px 0px 0px 0px; padding:0px;font-size: 14px; text-align:end; white-space: nowrap;">
                                Dr. Fetty Febriasti Bahar, S.T., M.T.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Paid : {{ $fee }}</strong></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
</body>

</html>
