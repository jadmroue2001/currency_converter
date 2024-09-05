<style>
    /* General Styles */
    body {
        font-family: 'Lato', sans-serif;
        color: #333;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    /* Container Styles */
    .container {
        max-width: 800px;
        margin: 50px auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Heading Styles */
    h1 {
        color: #006400;
        /* Dark green */
        font-size: 36px;
        margin-bottom: 20px;
    }

    /* Tab Styles */
    .nav-tabs .nav-link {
        color: #006400;
        /* Dark green */
        background-color: #e9f5e9;
        /* Light green background */
        border: 1px solid #c3e6c3;
        /* Soft green border */
        border-radius: 0.25rem;
        margin: 0 5px;
    }

    .nav-tabs .nav-link.active {
        color: #fff;
        background-color: #006400;
        /* Dark green */
        border-color: #006400 #006400 #fff;
    }

    /* Input and Select Styles */
    select,
    input[type="number"] {
        width: calc(100% - 20px);
        padding: 10px;
        margin: 10px 0 20px;
        border: 1px solid #c3e6c3;
        /* Soft green border */
        border-radius: 5px;
        font-size: 16px;
        background-color: #f0fff0;
        /* Light green */
    }

    /* Button Styles */
    .btn-primary {
        background-color: #006400;
        /* Dark green */
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #004b23;
        /* Darker green on hover */
    }

    /* Result Styles */
    .results {
        margin-top: 20px;
        font-size: 24px;
        color: #006400;
        /* Dark green */
    }

    h2 {
        color: #006400;
        /* Dark green */
    }

    .list-group-item {
        background-color: #f0fff0;
        /* Light green */
        border: 1px solid #c3e6c3;
        /* Soft green border */
        border-radius: 0.25rem;
    }
</style>


<?= $this->Form->create(null, ['type' => 'post']) ?>

<div class="container">
    <h1 class="text-center my-4">Currency Converter Calculator</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <nav>
                <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-sell-tab" data-bs-toggle="tab" data-bs-target="#nav-sell" type="button" role="tab" aria-controls="nav-sell" aria-selected="true" onclick="selectTab('sell');">I Want to Sell</button>
                    <button class="nav-link" id="nav-buy-tab" data-bs-toggle="tab" data-bs-target="#nav-buy" type="button" role="tab" aria-controls="nav-buy" aria-selected="false" onclick="selectTab('buy');">I Want to Buy</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <!-- I Want to Sell Tab Content -->
                <div class="tab-pane fade show active" id="nav-sell" role="tabpanel" aria-labelledby="nav-sell-tab">
                    <?= $this->Form->create(null, ['type' => 'post']) ?>

                    <!-- Hidden field to store the selected option value -->
                    <?= $this->Form->hidden('option', ['value' => '1', 'id' => 'optionValue']) ?>

                    <?= $this->Form->control('code', [
                        'type' => 'select',
                        'options' => $currencies,
                        'label' => 'Select Currency Code',
                        'class' => 'form-select'
                    ]) ?>

                    <?= $this->Form->control('amount', [
                        'label' => 'Total Amount to Sell',
                        'class' => 'form-control'
                    ]) ?>

                    <div class="text-center mt-3">
                        <?= $this->Form->button(__('Calculate'), ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?= $this->Form->end() ?>
                </div>

                <!-- I Want to Buy Tab Content -->
                <div class="tab-pane fade" id="nav-buy" role="tabpanel" aria-labelledby="nav-buy-tab">
                    <?= $this->Form->create(null, ['type' => 'post']) ?>

                    <!-- Hidden field to store the selected option value -->
                    <?= $this->Form->hidden('option', ['value' => '0', 'id' => 'optionValue']) ?>

                    <?= $this->Form->control('code', [
                        'type' => 'select',
                        'options' => $currencies,
                        'label' => 'Select Currency Code',
                        'class' => 'form-select'
                    ]) ?>

                    <?= $this->Form->control('amount', [
                        'label' => 'Total Amount to Buy',
                        'class' => 'form-control'
                    ]) ?>

                    <div class="text-center mt-3">
                        <?= $this->Form->button(__('Calculate'), ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>

    <?php if ($selectedCurrency) : ?>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <h2 class="text-center">Results for <?= h($selectedCurrency->code) ?></h2>
                <ul class="list-group">
                    <?= $x ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

</div>

<!-- JavaScript to manage tab persistence -->
<script>
    function selectTab(tab) {
        localStorage.setItem('selectedTab', tab);
        document.getElementById('optionValue').value = (tab === 'sell') ? '1' : '0';
    }

    document.addEventListener('DOMContentLoaded', function() {
        var selectedTab = localStorage.getItem('selectedTab');
        if (selectedTab) {
            var sellTab = document.getElementById('nav-sell-tab');
            var buyTab = document.getElementById('nav-buy-tab');
            var sellPane = document.getElementById('nav-sell');
            var buyPane = document.getElementById('nav-buy');

            if (selectedTab === 'sell') {
                sellTab.classList.add('active');
                buyTab.classList.remove('active');
                sellPane.classList.add('show', 'active');
                buyPane.classList.remove('show', 'active');
            } else if (selectedTab === 'buy') {
                buyTab.classList.add('active');
                sellTab.classList.remove('active');
                buyPane.classList.add('show', 'active');
                sellPane.classList.remove('show', 'active');
            }
        }
    });
</script>


