@if (config('maintenance.status', App\Enums\StatusEnum::Passive->value) == App\Enums\StatusEnum::Active->value)
    {{-- Giriş yapmış kullanıcılar için buton --}}
    @auth
        <div class="maintenance-button">
            @svg('fas-exclamation-triangle', 'text-white')
            <span>Siteniz şu an bakım modundadır. <br> Bu sayfayı sadece siz görebilirsiniz.</span>
        </div>
    @endauth

    <style>
        .maintenance-button {
            position: fixed;
            left: 0;
            bottom: 0;
            margin: 20px;
            background-color: #FE9F43;
            opacity: 0.8;
            color: white;
            padding: 15px 50px;
            border-radius: 100px;
            text-decoration: none;
            animation: blink-animation 1.5s infinite;
            display: inline-block;
            text-align: center;
            font-size: 12px;
            z-index: 9999;
        }

        .maintenance-button svg {
            display: block;
            width: 30px;
            height: 30px;
            margin: 0 auto 10px;
        }

        .maintenance-button span {
            display: block;
            font-weight: 600;
            color: white;
            margin-bottom: 10px;
        }

        .maintenance-button a {
            color: #1B2950;
            font-weight: 600;
            text-decoration: none;
            display: block;
        }

        /* Yanıp sönme efekti için keyframes */
        @keyframes blink-animation {
            0% {
                box-shadow: 0 0 5px #FE9F43;
            }

            50% {
                box-shadow: 0 0 30px #FE9F43;
            }

            100% {
                box-shadow: 0 0 5px #FE9F43;
            }
        }
    </style>
@endif
