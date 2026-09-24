@extends('layouts.frontend.master')
@section('content')
    <div class="page-banner relative mb-12">
        <div class="aspect-16/9 md:aspect-18/5 img-wrapper">
            <img src="{{ $setting['page_img'] ? asset($setting['page_img']) : '' }}">
        </div>
        <div class="absolute w-full h-full top-0 left-0 z-10">
            <div class="container h-full mx-auto">
                <div class="w-full h-full flex items-center banner-title relative">
                    <h1 class="text-3xl px-2 md:px-0 md:text-5xl font-semibold text-white tracking-wide">
                        Cost Calculator
                    </h1>
                </div>
            </div>
        </div>
        <div class="breadcrumb-wrapper z-10">
            <ol class="flex items-center whitespace-nowrap breadcrumbs bg-white">
                <li class="inline-flex items-center">
                    <a class="flex items-center text-base text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" href="/">
                        Home
                    </a>
                    <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                    </svg>
                </li>
                <li class="inline-flex items-center text-base font-semibold text-gray-800 truncate" aria-current="page">
                    Cost Calculator
                </li>
            </ol>
        </div>
    </div>

    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Study Cost Calculator</h2>
                    
                    <form id="costCalculatorForm" class="space-y-6">
                        <div>
                            <label for="tuitionFee" class="block text-sm font-medium text-gray-700 mb-2">
                                One Year Tuition Fee (£)
                            </label>
                            <input type="number" id="tuitionFee" step="0.01" oninput="validateNumeric(this)"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Enter tuition fee" required>
                        </div>

                        <div>
                            <label for="cashDeposit" class="block text-sm font-medium text-gray-700 mb-2">
                                Cash Deposit (£)
                            </label>
                            <input type="number" id="cashDeposit" step="0.01" oninput="validateNumeric(this)"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Enter cash deposit ">
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                Location
                            </label>
                            <select id="location" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                                <option value="">Select Location</option>
                                <option value="13761">Inside London</option>
                                <option value="10539">Outside London</option>
                            </select>
                        </div>

                        <button type="button" onclick="calculateCost()" 
                                class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 font-medium">
                            Calculate
                        </button>
                    </form>

                    <div id="results" class="mt-8 hidden">
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Calculation Results</h3>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Total Cost (GBP):</span>
                                    <span id="totalGBP" class="text-xl font-bold text-blue-600"></span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Total Cost (NPR):</span>
                                    <span id="totalNPR" class="text-xl font-bold text-green-600"></span>
                                </div>
                                
                                <div id="exchangeRate" class="text-sm text-gray-500 mt-2"></div>
                            </div>
                            
                            <div class="mt-4 p-3 bg-yellow-50 border-l-4 border-yellow-400">
                                <p class="text-sm text-yellow-800">
                                    <strong>Note:</strong> This is an estimated value and may vary by approximately £1,000–£1,500.
                                </p>
                            </div>
                            
                            <div class="mt-6 text-center">
                                <p class="text-gray-600 mb-3">For more information visit us</p>
                                <a href="/appointment" class="inline-block bg-primary text-white py-2 px-6 rounded-lg hover:bg-secondary transition duration-200 font-medium">
                                    Book an Appointment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function validateNumeric(input) {
            const value = input.value;
            const isValid = value === '' || (!isNaN(value) && !isNaN(parseFloat(value)));
            
            if (isValid) {
                input.classList.remove('border-red-500', 'bg-red-50');
                input.classList.add('border-gray-300');
            } else {
                input.classList.remove('border-gray-300');
                input.classList.add('border-red-500', 'bg-red-50');
            }
        }
        
        async function calculateCost() {
            const tuitionFee = parseFloat(document.getElementById('tuitionFee').value);
            const cashDeposit = parseFloat(document.getElementById('cashDeposit').value) || 0;
            const locationFee = parseFloat(document.getElementById('location').value);
            
            if (!tuitionFee || !locationFee) {
                alert('Please fill in tuition fee in Numbers and select location ');
                return;
            }
            
            // Calculate total in GBP
            const totalGBP = (tuitionFee - cashDeposit) + locationFee;
            
            try {
                // Get exchange rate from API
                const response = await fetch('https://api.exchangerate-api.com/v4/latest/GBP');
                const data = await response.json();
                const exchangeRate = data.rates.NPR;
                
                // Calculate total in NPR
                const totalNPR = totalGBP * exchangeRate;
                
                // Display results
                document.getElementById('totalGBP').textContent = '£' + totalGBP.toLocaleString('en-GB', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('totalNPR').textContent = 'Rs. ' + totalNPR.toLocaleString('en-NP', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('exchangeRate').textContent = `Exchange Rate: 1 GBP = ${exchangeRate.toFixed(2)} NPR`;
                
                document.getElementById('results').classList.remove('hidden');
                
            } catch (error) {
                console.error('Error fetching exchange rate:', error);
                // Fallback exchange rate
                const fallbackRate = 195;
                const totalNPR = totalGBP * fallbackRate;
                
                document.getElementById('totalGBP').textContent = '£' + totalGBP.toLocaleString('en-GB', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('totalNPR').textContent = 'Rs. ' + totalNPR.toLocaleString('en-NP', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                document.getElementById('exchangeRate').textContent = `Exchange Rate: 1 GBP = ${fallbackRate} NPR (Estimated)`;
                
                document.getElementById('results').classList.remove('hidden');
            }
        }
    </script>
@endsection