<footer class="bg-dark text-center text-lg-start position-absolute pb-0 pt-4 w-100">
    <div class="container mb-4">
        <div class="text-center p-3 text-white">
            <span style="user-select: none;">© Plaatselijk belang Drogeham</span> | <a class="text-decoration-none text-white hover-underline-animation hover-underline-white" href="{{route('disclaimer')}}">Colofon & disclaimer</a> | <a class="text-decoration-none text-white hover-underline-animation hover-underline-white" href="{{route('privacy')}}">Privacy verklaring</a>
        </div>
        <div class="container text-center custom_hidden_repeat">
            <button type="button" class="btn btn-primary" onclick="goToLink_facebook()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                </svg>
                Facebook
            </button>
            <script>
                function goToLink_facebook() {
                    window.open('https://www.facebook.com/pbdrogeham/', '_blank');
                }
            </script>
            <button type="button" class="btn btn-primary" onclick="location.href='mailto:pbdrogeham@gmail.com';">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"></path>
                </svg>
                E-mail
            </button>
            <button type="button" class="btn btn-primary" onclick="goToLink_location()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pin-map" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                    <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                </svg>
                Locatie
            </button>
            <script>
                function goToLink_location() {
                    window.open('https://goo.gl/maps/FKkNVYGDhJY49E1j7', '_blank');
                }
            </script>
        </div>
    </div>
</footer>