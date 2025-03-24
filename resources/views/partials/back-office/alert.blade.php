@if(session('success')) 
<div class="alert-success alert-dismissible"> 
    {{ session('success') }} 
</div> 
@endif 
@if(session('error')) 
<div class="alert-danger alert-dismissible"> 
    {{ session('error') }} 
</div> 
@endif 

<style>
    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
        padding: 15px;
        border: 1px solid transparent;
        border-radius: 4px;
        width: 100%;
        margin: 0 auto;
        text-align: center;
    }
    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 15px;
        border: 1px solid transparent;
        border-radius: 4px;
        width: 100%;
        margin: 0 auto;
        text-align: center;
    }
    .alert-dismissible {
        position: relative;
        padding-right: 35px;
    }
    .alert-dismissible::before {
        content: '×';
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const alerts = document.querySelectorAll('.alert-dismissible');

        // Dismiss alert on "×" click
        alerts.forEach(alert => {
            alert.addEventListener('click', (event) => {
                if (event.target.matches('::before')) {
                    alert.style.display = 'none'; // Hide the alert
                }
            });

            // Auto close after 30 seconds
            setTimeout(() => {
                alert.style.display = 'none';
            }, 10000); // 30 seconds in milliseconds
        });
    });
</script>
