  <style>
        .form-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .form-section h5 {
            margin-bottom: 15px;
            font-weight: bold;
        }

    h2.text-center.text-primary {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Adds subtle shadow */
        font-size: 2.5rem; /* Increases font size */
        font-weight: bold; /* Makes it bold */
        color: #007bff; /* Primary blue color */
        border-bottom: 2px solid #007bff; /* Adds an underline */
        display: inline-block; /* Ensures the underline wraps text */
        padding-bottom: 8px; /* Space between text and border */
        margin-left: 430px;
    }


    </style>

    <div class="container my-5">
        <h2 class="text-center text-primary mb-4">Booking Form</h2>

        <div class="form-container">
            <!-- General Information Section -->
            <div class="form-section">
                <h5>General Information</h5>
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" id="mobile" class="form-control" placeholder="Enter your mobile number" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose</label>
                        <textarea id="purpose" class="form-control" rows="3" placeholder="Enter the purpose of booking"></textarea>
                    </div>
                </form>
            </div>

            <!-- Item Details Section -->
            <div class="form-section" style="height: 300px;">
                <h5>Item Details</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="item" class="form-label">Select Item</label>
                        <select id="item" class="form-select">
                            <option value="" selected disabled>Select an item</option>
                            <option value="item1">Item 1</option>
                            <option value="item2">Item 2</option>
                            <option value="item3">Item 3</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" id="price" class="form-control" placeholder="Price" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" id="quantity" class="form-control" placeholder="Quantity" min="1" required>
                    </div>
                </div>
                <div class="col-md-3" style="position:relative; float:left;">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" id="discount" class="form-control" placeholder="discount"  readonly>
                    </div>

                    <div class="col-md-3" style="position:absolute; margin-left:300px;">
                        <label for="after discount" class="form-label">After Discount</label>
                        <input type="text" id="after discount" class="form-control" placeholder="value after discount" readonly>
                    </div>

                    <div class="col-md-3" style="position:absolute; margin-left:700px;">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" id="total" class="form-control" placeholder="total" readonly>
                    </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary" style="margin-top: 100px; margin-right:240px;">Submit Booking</button>
            </div>
        </div>
    </div>

    
