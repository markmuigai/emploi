<div class="card-deck text-center coloured-card row">
    <div class="col-md-12">
        <h3 class="orange pt-2 text-center" id="charges">Our Charges</h3>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            
            <h1>Kshs <br>2,500</h1>
            <p>SOLO</p>
            <ul class="tick">
                <li>1 Job Advert posted for 30 days</li><br>
                <li>Shared to social media pages</li><br>
                <li>Job AD sent out to our entire database</li>
            </ul>
            <br>
            <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="solo">
                <p>
                    <input type="submit" name="" value="Get Started" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1>Kshs <BR>4,750</h1>
            <p>SOLO PLUS</p>
            <ul class="tick">
                <li>2-4 job Adverts posted for 30 days</li><br>
                <li>Shared to Social media pages</li><br>
                <li>Job AD sent out to our entire database</li>
            </ul>
            <br>
            <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="solo_plus">
                <p>
                    <input type="submit" name="" value="Get Started" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1>Kshs 9,025</h1>
            <p>INFINITY</p>
            <ul class="tick">
                <li>More than 4 job Adverts posted for 30 days</li><br>
                <li>Shared to Social media pages</li><br>
                <li>Job AD sent out to entire database</li>
            </ul>
            <br>
            <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="infinity">
                <p>
                    <input type="submit" name="" value="Get Started" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body d-flex flex-column justify-content-center">
            <h1>Kshs 7,000</h1>
            <p>STAWI</p>
            <ul class="tick">
                <li>All   in Solo</li><br>
                <li>Search talent database</li><br>
                <li>Unlimited searches in 1 job category</li><br>
                <li>Get up to 50 CVs</li><br>
                <li>Referee reports</li>
            </ul>
            <br>
            <form method="POST" action="/checkout">
                @csrf
                <input type="hidden" name="product" value="stawi">
                <p>
                    <input type="submit" name="" value="Get Started" class="btn btn-orange-alt">
                </p>
            </form>
        </div>
    </div>
</div>