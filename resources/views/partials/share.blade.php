<div>
    <style>
        .hidden {
            display: none;
        }

        .share-dialog svg {
            width: 20px;
            height: 20px;
            margin-right: 7px;
        }

        button, .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: auto;
            padding-top: 8px;
            padding-bottom: 8px;
            color: #777;
            text-align: center;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.1;
            letter-spacing: 2px;
            text-transform: capitalize;
            text-decoration: none;
            white-space: nowrap;
            border-radius: 4px;
            border: 1px solid #ddd;
            cursor: pointer;
        }

        button:hover, .button:hover {
            border-color: #cdd;
        }

        .share-button, .copy-link {
            padding-left: 30px;
            padding-right: 30px;
        }

        .share-button, .share-dialog {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .share-dialog {
            display: none;
            width: 95%;
            max-width: 500px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, .15);
            z-index: -1;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 4px;
            background-color: #fff;
        }

        .share-dialog.is-open {
            display: block;
            z-index: 30;
        }

        header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .targets {
            display: grid;
            grid-template-rows: 1fr 1fr;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
            margin-bottom: 20px;
        }

        .close-button {
            background-color: transparent;
            border: none;
            padding: 0;
        }

        .close-button svg {
            margin-right: 0;
        }

        .share-link {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            border-radius: 4px;
            background-color: #eee;
        }

        .pen-url {
            margin-right: 15px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            border: unset;
            background-color: unset;
        }
        @media screen and (max-width: 320px) {
            .share-dialog{
                top: 150%;
            }
        }

        @media screen and (min-width: 321px) and (max-width: 375px) {
        }

        @media screen and (min-width: 376px) and (min-width: 425px) {
        }

        @media screen and (min-width: 426px) and (max-width: 768px) {
        }

        @media screen and (min-width: 769px) and (max-width: 1024px) {
        }

        @media screen and (min-width: 1025px) and (max-width: 1440px) {
        }

        @media screen and (min-width: 1441px) {
        }

    </style>
    <div class="share-dialog">
        <header>
            <h3 class="dialog-title">Partager</h3>
            <button class="close-button">
                <svg>
                    <use href="#close"></use>
                </svg>
            </button>
        </header>
        <div class="targets">
            <a class="button" id="share-fb" href="https://www.facebook.com/sharer/sharer.php?u=">
                <svg>
                    <use href="#facebook"></use>
                </svg>
                <span>Facebook</span>
            </a>

            <a class="button" id="share-wa" href="https://wa.me/?text=">
                <svg height="512pt" viewBox="-1 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m10.894531 512c-2.875 0-5.671875-1.136719-7.746093-3.234375-2.734376-2.765625-3.789063-6.78125-2.761719-10.535156l33.285156-121.546875c-20.722656-37.472656-31.648437-79.863282-31.632813-122.894532.058594-139.941406 113.941407-253.789062 253.871094-253.789062 67.871094.0273438 131.644532 26.464844 179.578125 74.433594 47.925781 47.972656 74.308594 111.742187 74.289063 179.558594-.0625 139.945312-113.945313 253.800781-253.867188 253.800781 0 0-.105468 0-.109375 0-40.871093-.015625-81.390625-9.976563-117.46875-28.84375l-124.675781 32.695312c-.914062.238281-1.84375.355469-2.761719.355469zm0 0" fill="#e5e5e5"/><path d="m10.894531 501.105469 34.46875-125.871094c-21.261719-36.839844-32.445312-78.628906-32.429687-121.441406.054687-133.933594 109.046875-242.898438 242.976562-242.898438 64.992188.027344 125.996094 25.324219 171.871094 71.238281 45.871094 45.914063 71.125 106.945313 71.101562 171.855469-.058593 133.929688-109.066406 242.910157-242.972656 242.910157-.007812 0 .003906 0 0 0h-.105468c-40.664063-.015626-80.617188-10.214844-116.105469-29.570313zm134.769531-77.75 7.378907 4.371093c31 18.398438 66.542969 28.128907 102.789062 28.148438h.078125c111.304688 0 201.898438-90.578125 201.945313-201.902344.019531-53.949218-20.964844-104.679687-59.09375-142.839844-38.132813-38.160156-88.832031-59.1875-142.777344-59.210937-111.394531 0-201.984375 90.566406-202.027344 201.886719-.015625 38.148437 10.65625 75.296875 30.875 107.445312l4.804688 7.640625-20.40625 74.5zm0 0" fill="#fff"/><path d="m19.34375 492.625 33.277344-121.519531c-20.53125-35.5625-31.324219-75.910157-31.3125-117.234375.050781-129.296875 105.273437-234.488282 234.558594-234.488282 62.75.027344 121.644531 24.449219 165.921874 68.773438 44.289063 44.324219 68.664063 103.242188 68.640626 165.898438-.054688 129.300781-105.28125 234.503906-234.550782 234.503906-.011718 0 .003906 0 0 0h-.105468c-39.253907-.015625-77.828126-9.867188-112.085938-28.539063zm0 0" fill="#64b161"/><g fill="#fff"><path d="m10.894531 501.105469 34.46875-125.871094c-21.261719-36.839844-32.445312-78.628906-32.429687-121.441406.054687-133.933594 109.046875-242.898438 242.976562-242.898438 64.992188.027344 125.996094 25.324219 171.871094 71.238281 45.871094 45.914063 71.125 106.945313 71.101562 171.855469-.058593 133.929688-109.066406 242.910157-242.972656 242.910157-.007812 0 .003906 0 0 0h-.105468c-40.664063-.015626-80.617188-10.214844-116.105469-29.570313zm134.769531-77.75 7.378907 4.371093c31 18.398438 66.542969 28.128907 102.789062 28.148438h.078125c111.304688 0 201.898438-90.578125 201.945313-201.902344.019531-53.949218-20.964844-104.679687-59.09375-142.839844-38.132813-38.160156-88.832031-59.1875-142.777344-59.210937-111.394531 0-201.984375 90.566406-202.027344 201.886719-.015625 38.148437 10.65625 75.296875 30.875 107.445312l4.804688 7.640625-20.40625 74.5zm0 0"/><path d="m195.183594 152.246094c-4.546875-10.109375-9.335938-10.3125-13.664063-10.488282-3.539062-.152343-7.589843-.144531-11.632812-.144531-4.046875 0-10.625 1.523438-16.1875 7.597657-5.566407 6.074218-21.253907 20.761718-21.253907 50.632812 0 29.875 21.757813 58.738281 24.792969 62.792969 3.035157 4.050781 42 67.308593 103.707031 91.644531 51.285157 20.226562 61.71875 16.203125 72.851563 15.191406 11.132813-1.011718 35.917969-14.6875 40.976563-28.863281 5.0625-14.175781 5.0625-26.324219 3.542968-28.867187-1.519531-2.527344-5.566406-4.046876-11.636718-7.082032-6.070313-3.035156-35.917969-17.726562-41.484376-19.75-5.566406-2.027344-9.613281-3.035156-13.660156 3.042969-4.050781 6.070313-15.675781 19.742187-19.21875 23.789063-3.542968 4.058593-7.085937 4.566406-13.15625 1.527343-6.070312-3.042969-25.625-9.449219-48.820312-30.132812-18.046875-16.089844-30.234375-35.964844-33.777344-42.042969-3.539062-6.070312-.058594-9.070312 2.667969-12.386719 4.910156-5.972656 13.148437-16.710937 15.171875-20.757812 2.023437-4.054688 1.011718-7.597657-.503906-10.636719-1.519532-3.035156-13.320313-33.058594-18.714844-45.066406zm0 0" fill-rule="evenodd"/></g></svg>
                <span>WhatsApp</span>
            </a>

            <a id="share-email" class="button" data-href="mailto:?subject=Catalogue&body={{url($operation->shortname."/product")}}" href="">
                <svg>
                    <use href="#email"></use>
                </svg>
                <span>Email</span>
            </a>
        </div>
        <div class="share-link">
            <input type="text" class="pen-url" data-value="{{url($operation->shortname.'/product')}}" value=""/>
            <button class="copy-link">Copier</button>
        </div>
    </div>

   {{-- <button class="share-button" type="button" title="Share this article">
        <svg>
            <use href="#share-icon"></use>
        </svg>
        <span>Share</span>
    </button>--}}

    <svg class="hidden">
        <defs>
            <symbol id="share-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-share">
                <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                <polyline points="16 6 12 2 8 6"></polyline>
                <line x1="12" y1="2" x2="12" y2="15"></line>
            </symbol>

            <symbol id="facebook" viewBox="0 0 24 24" fill="#3b5998" stroke="#3b5998" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
            </symbol>

            <symbol id="twitter" viewBox="0 0 24 24" fill="#1da1f2" stroke="#1da1f2" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
                <path
                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
            </symbol>

            <symbol id="email" viewBox="0 0 24 24" fill="#777" stroke="#fafafa" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-mail">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
            </symbol>

            <symbol id="linkedin" viewBox="0 0 24 24" fill="#0077B5" stroke="#0077B5" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                <rect x="2" y="9" width="4" height="12"></rect>
                <circle cx="4" cy="4" r="2"></circle>
            </symbol>
            <symbol id="close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="9" y1="9" x2="15" y2="15"></line>
                <line x1="15" y1="9" x2="9" y2="15"></line>
            </symbol>
        </defs>
    </svg>
</div>
