<div class="w-full max-w-none min-w-0">
    <div class="bg-gray-100 rounded-lg p-4 mb-4">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-900">QR del Estudio</h3>
        </div>
    </div>

    <div class="w-full bg-white rounded-lg shadow-sm border overflow-hidden">
        <div class="p-6 flex flex-col items-center justify-center gap-4">
            <img src="{{ $qrSrc }}" alt="QR del estudio" class="w-48 h-48" loading="lazy" />
            <div class="text-center text-sm text-gray-600 break-words">
                <p>Enlace público:</p>
                <a href="{{ $publicUrl }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline">{{ $publicUrl }}</a>
            </div>
        </div>
    </div>
    <div class="mt-4 text-sm text-gray-600 text-center">
        <p>Escanea el código o comparte el enlace para visualizar el estudio sin iniciar sesión.</p>
    </div>
</div>


