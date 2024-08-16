<!doctype html>
<html>

<head>
    <style>
        .hijaiyah-container {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }

        .hijaiyah-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }

        .hijaiyah-letter {
            font-size: 24px;
            font-weight: bold;
        }

        .speaker-button {
            background-color: #13DEB9;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .speaker-button:hover {
            background-color: #10bd9d;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <img src="" alt="">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-semibold mb-0">Pelafalan Huruf Hijaiyah</h5>
                    <p class="mb-0 text-end text-muted bg-light border rounded p-2" style="max-width: 350px;">Pengisi Suara: Kak Devi Ariasandi Puteri, S.P</p>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ا</div>
                            <button class="speaker-button" onclick="playAudio('alif')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ب</div>
                            <button class="speaker-button" onclick="playAudio('ba')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ت</div>
                            <button class="speaker-button" onclick="playAudio('ta')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ث</div>
                            <button class="speaker-button" onclick="playAudio('tsa')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ج</div>
                            <button class="speaker-button" onclick="playAudio('jim')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ح</div>
                            <button class="speaker-button" onclick="playAudio('ha')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">خ</div>
                            <button class="speaker-button" onclick="playAudio('kho')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">د</div>
                            <button class="speaker-button" onclick="playAudio('dal')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ذ</div>
                            <button class="speaker-button" onclick="playAudio('dzal')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ر</div>
                            <button class="speaker-button" onclick="playAudio('ra')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ز</div>
                            <button class="speaker-button" onclick="playAudio('zai')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">س</div>
                            <button class="speaker-button" onclick="playAudio('sin')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ش</div>
                            <button class="speaker-button" onclick="playAudio('syin')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ص</div>
                            <button class="speaker-button" onclick="playAudio('shod')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ض</div>
                            <button class="speaker-button" onclick="playAudio('dhod')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ط</div>
                            <button class="speaker-button" onclick="playAudio('tho')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ظ</div>
                            <button class="speaker-button" onclick="playAudio('dzo')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ع</div>
                            <button class="speaker-button" onclick="playAudio('ain')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">غ</div>
                            <button class="speaker-button" onclick="playAudio('ghoin')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ف</div>
                            <button class="speaker-button" onclick="playAudio('fa')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ق</div>
                            <button class="speaker-button" onclick="playAudio('qof')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ك</div>
                            <button class="speaker-button" onclick="playAudio('kaf')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ل</div>
                            <button class="speaker-button" onclick="playAudio('lam')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">م</div>
                            <button class="speaker-button" onclick="playAudio('mim')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ن</div>
                            <button class="speaker-button" onclick="playAudio('nun')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">و</div>
                            <button class="speaker-button" onclick="playAudio('wau')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ه</div>
                            <button class="speaker-button" onclick="playAudio('ha2')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ء</div>
                            <button class="speaker-button" onclick="playAudio('hamzah')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                        <div class="hijaiyah-item">
                            <div class="hijaiyah-letter">ي</div>
                            <button class="speaker-button" onclick="playAudio('ya')"><i class="ti ti-volume fs-6"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Audio files -->
                <audio id="alif" src="assets/hijaiyah/alif.mp3"></audio>
                <audio id="ba" src="assets/hijaiyah/ba.mp3"></audio>
                <audio id="ta" src="assets/hijaiyah/ta.mp3"></audio>
                <audio id="tsa" src="assets/hijaiyah/tsa.mp3"></audio>
                <audio id="jim" src="assets/hijaiyah/jim.mp3"></audio>
                <audio id="ha" src="assets/hijaiyah/ha.mp3"></audio>
                <audio id="kho" src="assets/hijaiyah/kho.mp3"></audio>
                <audio id="dal" src="assets/hijaiyah/dal.mp3"></audio>
                <audio id="dzal" src="assets/hijaiyah/dzal.mp3"></audio>
                <audio id="ra" src="assets/hijaiyah/ra.mp3"></audio>
                <audio id="zai" src="assets/hijaiyah/zai.mp3"></audio>
                <audio id="sin" src="assets/hijaiyah/sin.mp3"></audio>
                <audio id="syin" src="assets/hijaiyah/syin.mp3"></audio>
                <audio id="shod" src="assets/hijaiyah/shod.mp3"></audio>
                <audio id="dhod" src="assets/hijaiyah/dhod.mp3"></audio>
                <audio id="tho" src="assets/hijaiyah/tho.mp3"></audio>
                <audio id="dzo" src="assets/hijaiyah/dzo.mp3"></audio>
                <audio id="ain" src="assets/hijaiyah/ain.mp3"></audio>
                <audio id="ghoin" src="assets/hijaiyah/ghoin.mp3"></audio>
                <audio id="fa" src="assets/hijaiyah/fa.mp3"></audio>
                <audio id="qof" src="assets/hijaiyah/qof.mp3"></audio>
                <audio id="kaf" src="assets/hijaiyah/kaf.mp3"></audio>
                <audio id="lam" src="assets/hijaiyah/lam.mp3"></audio>
                <audio id="mim" src="assets/hijaiyah/mim.mp3"></audio>
                <audio id="nun" src="assets/hijaiyah/nun.mp3"></audio>
                <audio id="wau" src="assets/hijaiyah/wau.mp3"></audio>
                <audio id="ha2" src="assets/hijaiyah/ha2.mp3"></audio>
                <audio id="hamzah" src="assets/hijaiyah/hamzah.mp3"></audio>
                <audio id="ya" src="assets/hijaiyah/ya.mp3"></audio>
            </div>
        </div>
    </div>

    <script>
        function playAudio(letter) {
            document.getElementById(letter).play();
        }
    </script>
</body>

</html>