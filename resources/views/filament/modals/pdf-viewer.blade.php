<div class="w-full max-w-none min-w-0">
    <div class="bg-gray-100 rounded-lg p-4 mb-4">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">Visualizador de PDF</h3>
        </div>
    </div>

    <div class="w-full bg-white rounded-lg shadow-sm border overflow-hidden">
        {{-- IFRAME del viewer de PDF.js (no el PDF directo) --}}
        <iframe
            src="{{ $viewerUrl }}"
            class="w-full h-full block rounded-lg transition-opacity duration-300"
            style="opacity:0; height: 75dvh; min-height: 60dvh; max-height: 90dvh; width: 100%;"
            frameborder="0"
            allowfullscreen
            loading="lazy"
            onload="this.style.opacity='1'">
        </iframe>
    </div>

    <div class="mt-4 text-sm text-gray-600 text-center">
        <p>Si no se muestra correctamente,
            <a href="{{ $downloadUrl }}" class="text-blue-600 hover:text-blue-800 underline">
                descarga el PDF
            </a>
            o
            <a href="{{ str_replace('download=1','', $downloadUrl) }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline">
                ábrelo en una nueva pestaña
            </a>.
        </p>
    </div>
</div>
