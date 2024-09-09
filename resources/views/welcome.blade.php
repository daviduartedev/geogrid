<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GeoGridMapsTest</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
#background-modal {
    background-color: "black"
    width: 10px
    size: 100%;
}
            #area-icon-${item.id} img { /* Seletor para imagens dentro do elemento com id "area-icon" */
                width: 15px;  /* Largura desejada para o ícone de área */
                height: 15px; /* Altura desejada para o ícone de área */
            }
            #map {
                height: 0;
                padding-bottom: 56.25%; /* 16:9 aspect ratio */
                width: 100%; 
                position: absolute; /* Necessário para posicionar o mapa dentro do contêiner */
            }
            #dataModalItems {
                justify-content: space-between;
            }
            #delete-icon img {
                width: 15px;
                height: 15px;
            }
            #consulta-icon img {
                margin-left: 200px;
                width: 20px;
                height: 20px;
            }
            #search-icon {
                position: absolute;
                bottom: 2rem; /* Distância da parte inferior */
                right: 5rem;  /* Distância da direita */
                cursor: pointer;
                z-index: 1000;
            }
           #search-icon img { 
                width: 150px; /* Ajuste o tamanho conforme necessário */
                height: 150px;
            }  
            #dataModal {
                background-color: #b7b5b6;
                border-radius: 20px;
                z-index: 1000;
                padding: 20px;
                position: fixed;
                top: 50%; 
                left: 50%;
                transform: translate(-50%, -50%);
                max-width: 80%; 
            }
         
            /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:red;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
        </style>
    </head>
    <body id="body" class="font-sans antialiased dark:bg-black dark:text-white/50">

    <div id="dataModal" class="hidden overflow-y-auto z-50">
    <div class="relative mx-auto p-5 border w-1/2 shadow-lg rounded-md"> 
        <div class="mt-3 text-center">
            <div id="background-modal"></div>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500" id="modalContent"></p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="closeModal" class="px-4 py-2 bg-gray-800 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2   
 focus:ring-indigo-500">Fechar</button>
            </div>
        </div>
    </div>
</div>
<div id="smallModal" class="hidden fixed top-0 left-0 w-full h-full flex items-center justify-center z-50">
    <div class="bg-white p-4 rounded shadow-md">
        <p id="smallModalContent"></p>
        <button id="closeSmallModal" class="mt-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Fechar</button>
    </div>
</div>

    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div id="map" class="w-full h-screen" tabindex="-1"></div> 

    <div id="search-icon" class="absolute top-4 right-4 cursor-pointer">
        <img src="{{ asset('img/icons-search.png') }}" alt="Lupa"> 
    </div>
    
    <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <main class="mt-6">
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                    <form action="{{ route('points.store') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </main>
        </div>
        <div class="hidden overflow-y-auto z-50">
            
                            <table class="w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left">Description</th>
                                        <th class="text-left">Latitude</th>
                                        <th class="text-left">Longitude</th>
                                        <th class="text-left">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($points as $point)
                                        <tr>
                                            <td>{{ $point->description }}</td>
                                            <td>{{ $point->latitude }}</td>
                                            <td>{{ $point->longitude }}</td>
                                            <td>
                                                <form action="{{ route('points.destroy', $point) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    </div>
</div>

<script>
const searchIcon = document.getElementById('search-icon');
const modal = document.getElementById('dataModal');
const closeModalButton = document.getElementById('closeModal');
const modalContent = document.getElementById('modalContent');

// Variável para armazenar o mapa (declarada fora de initMap para ser acessível globalmente)
let map; 

searchIcon.addEventListener('click', () => {
    // Buscar os dados salvos (substitua pela sua lógica de busca)
    fetch('/buscar-dados') // Substitua '/buscar-dados' pela sua rota
        .then(response => response.json())
        .then(data => {
            // Exibir os dados no modal
            let content = '';
            data.forEach(item => {
                content += `
                <div class="flex justify-between items-center"> 
                    <p>${item.description}</p>
                    <div id="consulta-icon" class="cursor-pointer"> 
                        <img src="{{ asset('img/search.png') }}" alt="Ícone de Consulta"> 
                    </div>
                    <div id="delete-icon" class="cursor-pointer" data-item-id="${item.id}"> 
                        <img src="{{ asset('img/delete.png') }}" alt="Ícone de Lixeira"> 
                    </div>
                    <div id="area-icon-${item.id}" class="cursor-pointer" > 
                        <img src="{{ asset('img/area.png') }}" alt="Ícone de Área""> 
                    </div>
                </div>
                <br>
            `;
            });
            modalContent.innerHTML = content;

            // Exibir o modal
            modal.classList.remove('hidden');

            const consultaIcons = document.querySelectorAll('[id^="consulta-icon"]');
            consultaIcons.forEach(icon => {
                icon.addEventListener('click', () => {
                    const parentDiv = icon.closest('.flex'); // Encontra o div pai que contém a descrição
                    const description = parentDiv.querySelector('p').textContent; // Obtém a descrição

                    // Encontrar o item correspondente nos dados
                    const item = data.find(item => item.description === description);
                    if (item) {
                        // Exibir as coordenadas na pequena modal
                        document.getElementById('smallModalContent').textContent = `Latitude: ${item.latitude}, Longitude: ${item.longitude}`;
                        document.getElementById('smallModal').classList.remove('hidden');
                    }
                });
            });

            // Adicionar listener para fechar a pequena modal
            document.getElementById('closeSmallModal').addEventListener('click', () => {
                document.getElementById('smallModal').classList.add('hidden');
            });

            // Adicionar listeners aos ícones de área (após o modal ser preenchido)
            const areaIcons = document.querySelectorAll('[id^="area-icon-"]');
            areaIcons.forEach(icon => {
                icon.addEventListener('click', () => {
                    const itemId = icon.id.split('-')[2]; // Extrair o ID do item do ID do ícone

                    // Encontrar o item correspondente nos dados
                    const item = data.find(item => item.id == itemId);
                    if (item) {
                        // Centralizar o mapa nas coordenadas do item
                        map.setCenter({ lat: item.latitude, lng: item.longitude });

                        // Opcional: ajustar o zoom, se necessário
                        // map.setZoom(15); // Ou outro valor de zoom desejado
                    }

                    // Fechar o modal
                    modal.classList.add('hidden');
                });
            });

            // Adicionar listeners aos ícones de delete (após o modal ser preenchido)
            const deleteIcons = document.querySelectorAll('[id^="delete-icon"]');
            deleteIcons.forEach(icon => {
                icon.addEventListener('click', () => {
                    const itemId = icon.dataset.itemId; 

                    // Lógica para excluir o item (AJAX)
                    deleteItem(itemId);

                    // Remover o item visualmente do modal
                    icon.closest('.flex').remove(); 
                });
            });
        });
});

closeModalButton.addEventListener('click', () => {
    // Ocultar o modal
    modal.classList.add('hidden');
});

function initMap() {
    console.log("Inicializando o mapa...");

    // Tenta obter a localização do usuário
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                initializeMap(userLocation);
            },
            () => {
                // Se não conseguir obter a localização, usa coordenadas padrão
                const defaultLocation = { lat: -34.397, lng: 150.644 };
                initializeMap(defaultLocation);
            }
        );
    } else {
        // Se o navegador não suportar geolocalização, usa coordenadas padrão
        const defaultLocation = { lat: -34.397, lng: 150.644 };
        initializeMap(defaultLocation);
    }
}

function initializeMap(center) {
    map = new google.maps.Map(document.getElementById("map"), {
        center: center,
        zoom: 13, // Zoom inicial mais próximo
    });

    // Adiciona os marcadores existentes do banco de dados ao mapa
    @foreach ($points as $point)
        new google.maps.Marker({
            position: { lat: {{ $point->latitude }}, lng: {{ $point->longitude }} },
            map: map,
            title: '{{ $point->description }}'
        });
    @endforeach

    // Adiciona um listener para cliques no mapa (cria NOVOS marcadores)
    map.addListener("click", (event) => {
        const marker = new google.maps.Marker({
            position: event.latLng,
            map: map
        });

        // Abre um prompt para o usuário inserir a descrição
        const description = prompt("Digite a descrição do marcador:");

        // Salva as informações do marcador (AJAX)
        saveMarker(event.latLng.lat(), event.latLng.lng(), description, marker);
    });
}

function deleteItem(itemId) {
    fetch(`/delete-point/${itemId}`, { // Inclua o itemId na URL
        method: 'DELETE', 
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' 
        }
        // Não precisa enviar o corpo da requisição se o id está na URL
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro na requisição de exclusão');
        }
        return response.json();
    })
    .then(data => {
        console.log(data.message); 

        // Opcional: Recarregar a lista de itens no modal após a exclusão
        // ...
    })
    .catch(error => {
        console.error('Erro ao excluir o item:', error);

        // Opcional: Exibir uma mensagem de erro para o usuário
        // ...
    });
}

function saveMarker(latitude, longitude, description, marker) {
    fetch('{{ route('points.store') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' 
        },
        body: JSON.stringify({
            description: description,
            latitude: latitude,
            longitude: longitude
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro na requisição');
        }
        return response.json();
    })
    .then(data => {
        console.log(data.message); 

        // Atualiza o título do marcador com a descrição
        marker.setTitle(description);
    })
    .catch(error => {
        console.error('Erro ao salvar o marcador:', error);

        // Remove o marcador se houve erro no salvamento
        marker.setMap(null);
    });
}
</script> 
</script>=      
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbKs_zBvbMG1kSK7Ffw3usDcu7fGkXF_g&callback=initMap" async defer></script>

</body>

</html>

