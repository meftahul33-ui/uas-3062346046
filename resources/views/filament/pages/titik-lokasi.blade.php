<x-filament-panels::page>
    <div class="space-y-6">
        <!-- MAP -->
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Peta Lokasi Penilaian</h2>
            <div id="map"></div>
        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-4">Daftar Titik Lokasi</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIM</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Latitude</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Longitude</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($biodata as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm">{{ $item['nama'] }}</td>
                                <td class="px-6 py-4 text-sm">{{ $item['nim'] }}</td>
                                <td class="px-6 py-4 text-sm">{{ $item['alamat'] }}</td>
                                <td class="px-6 py-4 text-sm">{{ $item['latitude'] }}</td>
                                <td class="px-6 py-4 text-sm">{{ $item['longitude'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- STYLE -->
    <style>
        #map {
            height: 600px;
            width: 100%;
            border-radius: 8px;
        }
    </style>

    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" defer></script>

    <!-- SCRIPT -->
    <script>
        function initMap() {
            const mapElement = document.getElementById('map');
            if (!mapElement || typeof L === 'undefined') {
                setTimeout(initMap, 100);
                return;
            }

            // INIT MAP
            const map = L.map('map').setView([-6.200000, 106.816666], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            const biodata = @json($biodata);
            const validPoints = [];

            biodata.forEach(item => {
                if (!isNaN(item.latitude) && !isNaN(item.longitude)) {
                    const lat = Number(item.latitude);
                    const lng = Number(item.longitude);

                    const marker = L.marker([lat, lng]).addTo(map);

                    marker.bindPopup(`
                        <strong>${item.nama}</strong><br>
                        NIM: ${item.nim}<br>
                        Alamat: ${item.alamat}<br>
                        Jenis Kelamin: ${item.jenis_kelamin}<br>
                        Hobby: ${item.hobby}<br>
                        Latitude: ${lat}<br>
                        Longitude: ${lng}
                    `);

                    validPoints.push([lat, lng]);
                }
            });

            // AUTO ZOOM KE SEMUA MARKER
            if (validPoints.length > 0) {
                map.fitBounds(validPoints, { padding: [50, 50] });
            }
        }

        // Jalankan setelah DOM ready dan Leaflet loaded
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initMap);
        } else {
            initMap();
        }
    </script>
</x-filament-panels::page>
