<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Insurance</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white p-4">
        <h1 class="text-center text-3xl font-bold">Farm Insurance</h1>
    </header>

    <main class="container mx-auto mt-8 p-4">
        <!-- Livestock Insurance Section -->
        <section class="bg-white shadow-md rounded-lg p-6 mb-8">
            <div class="md:flex">
                <img src="https://source.unsplash.com/featured/?livestock" alt="Livestock Insurance" class="w-full md:w-1/2 rounded-lg mb-4 md:mb-0 md:mr-4">
                <div>
                    <h2 class="text-2xl font-semibold mb-4">Livestock Insurance</h2>
                    <p class="text-gray-700 mb-4">
                        Protect your livestock investment with our comprehensive insurance plans. Ensure your animals are covered against accidents, diseases, and natural disasters.
                    </p>
                    <a href="{{route('live_insurance')}}" class="text-blue-600 hover:underline">Learn about livestock insurance</a>
                </div>
            </div>
        </section>

        <!-- Crop Insurance Section -->
        <section class="bg-white shadow-md rounded-lg p-6 mb-8">
            <div class="md:flex">
                <img src="https://source.unsplash.com/featured/?crops" alt="Crop Insurance" class="w-full md:w-1/2 rounded-lg mb-4 md:mb-0 md:mr-4">
                <div>
                    <h2 class="text-2xl font-semibold mb-4">Crop Insurance</h2>
                    <p class="text-gray-700 mb-4">
                        Protect your crop investment with our reliable insurance plans. Get coverage for your crops against natural disasters, pests, and diseases.
                    </p>
                    <a href="#learn-crop-insurance" class="text-blue-600 hover:underline">Learn about crop insurance</a>
                </div>
            </div>
        </section>

        <!-- Learn More Sections -->
        <section id="learn-livestock-insurance" class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h3 class="text-xl font-semibold mb-4">Learn About Livestock Insurance</h3>
            <p class="text-gray-700 mb-4">
                Livestock insurance provides coverage against a variety of risks that can affect your animals, including:
            </p>
            <ul class="list-disc list-inside mb-4">
                <li>Accidents and injuries</li>
                <li>Diseases and illnesses</li>
                <li>Natural disasters</li>
                <li>Theft or loss</li>
            </ul>
            <p class="text-gray-700 mb-4">
                Our insurance plans are designed to offer you peace of mind and financial protection in case of unforeseen events. Contact us to get a personalized quote.
            </p>
        </section>

        <section id="learn-crop-insurance" class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-xl font-semibold mb-4">Learn About Crop Insurance</h3>
            <p class="text-gray-700 mb-4">
                Crop insurance provides financial protection for your crops against:
            </p>
            <ul class="list-disc list-inside mb-4">
                <li>Natural disasters like floods, droughts, and storms</li>
                <li>Pest infestations</li>
                <li>Diseases</li>
                <li>Unexpected yield losses</li>
            </ul>
            <p class="text-gray-700 mb-4">
                With our crop insurance plans, you can ensure that your farming operations are secure and that you are protected against significant financial losses. Contact us to learn more.
            </p>
        </section>
    </main>
</body>
</html>
