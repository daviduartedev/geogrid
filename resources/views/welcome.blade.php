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
        #smallModal {
            position: absolute;
            align-items: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
        }

        #area-icon-$ {
            item.id
        }

        img {
            width: 20px;
            height: 20px;
        }

        #area-icon-$ {
            item.id
        }

            {
            width: 20px;
            height: 20px;
        }

        #map {
            height: 0;
            padding-bottom: 56.25%;
            width: 100%;
            position: absolute;
        }

        #dataModalItems {
            justify-content: space-between;
        }

        #closeModal {
            justify-content: flex-end;
            margin-left: 350px;
            margin-bottom: 15px;
        }

        #divisoria-icon {
            width: 15px;
            height: 15px;
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
            bottom: 2rem;
            right: 5rem;
            cursor: pointer;
            z-index: 1000;
        }

        #search-icon img {
            width: 150px;
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

        /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        ::after,
        ::before {
            --tw-content: ''
        }

        :host,
        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            font-feature-settings: normal;
            font-variation-settings: normal;
            -webkit-tap-highlight-color: transparent
        }

        [type=button],
        [type=reset],
        [type=submit],
        button {
            -webkit-appearance: button;
            background-color: red;
        }


        p,
        pre {
            margin: 0
        }

        fieldset {
            margin: 0;
            padding: 0
        }

        legend {
            padding: 0
        }

        .hidden {
            display: none
        }

            {
            width: 100%
        }

        .justify-center {
            justify-content: center
        }

        .text-black {
            --tw-text-opacity: 1;
            color: rgb(0 0 0 / var(--tw-text-opacity))
        }

        .text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }
    </style>
</head>

<body id="body" class="font-sans :bg-black :text-white">
    <div id="dataModal" class="hidden">
        <div>
            <div>
                <img id="closeModal" src="{{ asset('img/close-icon.png') }}" <div class="text-center">
                <div id="background-modal"></div>
                <div>
                    <p id="modalContent"></p>
                </div>
            </div>
        </div>
    </div>

    <div id="smallModal" class="hidden justify-center">
        <div>
            <p id="smallModalContent"></p>
            <button id="closeSmallModal" class="hover:bg-gray-700 text-white">Fechar</button>
        </div>
    </div>

    <div class="text-black :bg-black :text-white">
        <div id="map" tabindex="-1"></div>

        <div id="search-icon" class=" cursor-pointer">
            <img src="{{ asset('img/icons-search.png') }}" alt="Lupa">
        </div>

        <div class="flex justify-center selection:text-white">
            <div class=">
                <main class=" mt-6">
                <div class="grid ">
                    <form action="{{ route('points.store') }}" method="POST">
                        @csrf
                    </form>
                </div>
                </main>
            </div>
            <div class="hidden">

                <table class=">
                    <thead>
                        <tr>
                            <th class=" text-left">Description</th>
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
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-white py-2 px-4">Delete</button>
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
        const smallModal = document.getElementById('smallModal');
        const smallModalContent = document.getElementById('smallModalContent');
        const closeSmallModalButton = document.getElementById('closeSmallModal');

        let map; // Variável para armazenar o mapa

        searchIcon.addEventListener('click', () => {
            fetch('/buscar-dados') // Substitua '/buscar-dados' pela sua rota
                .then(response => response.json())
                .then(data => {
                    // Exibir os dados no modal
                    let content = '';
                    data.forEach(item => {
                        content += `
                            <div style="display: flex; justify-content: space-between; width: 100%;"> 
                                <div> <p>${item.description}</p> </div> 
                                    <div style="display: flex; margin-left: 150px; flex-shrink: 0;"> 
                                        <div id="divisoria-icon">
                                            <img src="{{ asset('img/divisor.png') }}" alt="Ícone de Divisória"> 
                                        </div>
                                        <div id="consulta-icon-${item.id}" class="cursor-pointer" data-item-id="${item.id}"> 
                                            <img src="{{ asset('img/search.png') }}" alt="Ícone de Consulta"> 
                                        </div>
                                        <div id="delete-icon-${item.id}" class="cursor-pointer" data-item-id="${item.id}"> 
                                            <img src="{{ asset('img/delete.png') }}" alt="Ícone de Lixeira"> 
                                        </div>
                                        <div id="area-icon-${item.id}" class="cursor-pointer" data-item-id="${item.id}"> 
                                            <img src="{{ asset('img/area.png') }}" alt="Ícone de Área""> 
                                        </div>
                                    </div>
                            </div>
                <br>
                `;
                    });
                    modalContent.innerHTML = content;

                    // Exibir o modal
                    modal.classList.remove('hidden');


                    // Adicionar listeners aos ícones de consulta (após o modal ser preenchido)
                    const consultaIcons = document.querySelectorAll('[id^="consulta-icon-"]');
                    consultaIcons.forEach(icon => {
                        icon.addEventListener('click', () => {
                            const itemId = icon.dataset.itemId;

                            // Encontrar o item correspondente nos dados
                            const item = data.find(item => item.id == itemId);
                            if (item) {
                                // Exibir as coordenadas na pequena modal
                                smallModalContent.textContent = `Latitude: ${item.latitude}, Longitude: ${item.longitude}`;
                                smallModal.classList.remove('hidden');
                            }
                        });
                    });

                    // Adicionar listeners aos ícones de área (após o modal ser preenchido)
                    const areaIcons = document.querySelectorAll('[id^="area-icon-"]');
                    areaIcons.forEach(icon => {
                        icon.addEventListener('click', () => {
                            const itemId = icon.dataset.itemId; // Extrair o ID do item do ID do ícone

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
                    const deleteIcons = document.querySelectorAll('[id^="delete-icon-"]');
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
            modal.classList.add('hidden');
        });

        closeSmallModalButton.addEventListener('click', () => {
            smallModal.classList.add('hidden');
        });

        smallModal.style.zIndex = 1001; // Garante que fique por cima do dataModal


        function initMap() {

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbKs_zBvbMG1kSK7Ffw3usDcu7fGkXF_g&callback=initMap"
        async defer></script>

</body>

</html>