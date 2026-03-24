<?php 
$id = intval($_GET['id']); // get ID
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pages</title>
    <style>
        :root {
            --dark-bg: #121212;
            --card-bg: #252525;
            --accent: #ff7b2c;
            --accent-hover: #ff7b2c;
            --text-primary: #f5f5f5;
            --text-secondary: #b0b0b0;
            --success: #ff7b2c;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }

        .icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
        }

        .success .icon {
            background-color: rgba(255, 123, 44, 0.2);
            color: var(--success);
        }

        .error .icon {
            background-color: rgba(255, 59, 48, 0.2);
            color: #ff3b30;
        }

        h1 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 28px;
        }

        p {
            text-align: center;
            color: var(--text-secondary);
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--accent);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--accent-hover);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--text-secondary);
            border: 1px solid var(--text-secondary);
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--text-primary);
        }

        .status-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .success-dot {
            background-color: var(--success);
        }

        .error-dot {
            background-color: #ff3b30;
        }

        .status-text {
            font-size: 14px;
            color: var(--text-secondary);
        }
        #cardsuccess {
                    display: none;
        }
        #cardsuccess{
                    display: none;
        }
        @media (max-width: 600px) {
            .card {
                padding: 20px;
            }
            
            .actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }

:root {
  --duration: 1.5s;
  --container-size: 250px;
  --box-size: 33px;
  --box-border-radius: 15%;
}

.container1 {
  width: var(--container-size);
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
}

.📦 {
  width: var(--box-size);
  height: var(--box-size);
  position: relative;
  display: block;
  transform-origin: -50% center;
  border-radius: var(--box-border-radius);
}
.📦:after {
  content: "";
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  background-color: lightblue;
  border-radius: var(--box-border-radius);
  box-shadow: 0px 0px 10px 0px rgba(28, 159, 255, 0.4);
}
.📦:nth-child(1) {
  animation: slide var(--duration) ease-in-out infinite alternate;
}
.📦:nth-child(1):after {
  animation: color-change var(--duration) ease-in-out infinite alternate;
}
.📦:nth-child(2) {
  animation: flip-1 var(--duration) ease-in-out infinite alternate;
}
.📦:nth-child(2):after {
  animation: squidge-1 var(--duration) ease-in-out infinite alternate;
}
.📦:nth-child(3) {
  animation: flip-2 var(--duration) ease-in-out infinite alternate;
}
.📦:nth-child(3):after {
  animation: squidge-2 var(--duration) ease-in-out infinite alternate;
}
.📦:nth-child(4) {
  animation: flip-3 var(--duration) ease-in-out infinite alternate;
}
.📦:nth-child(4):after {
  animation: squidge-3 var(--duration) ease-in-out infinite alternate;
}
.📦:nth-child(5) {
  animation: flip-4 var(--duration) ease-in-out infinite alternate;
}
.📦:nth-child(5):after {
  animation: squidge-4 var(--duration) ease-in-out infinite alternate;
}
.📦:nth-child(2):after {
  background-color: #ff5702ff;
}
.📦:nth-child(3):after {
  background-color:#ff6b21ff;
}
.📦:nth-child(4):after {
  background-color:#f87d3fff;
}
.📦:nth-child(5):after {
  background-color:#ffffffff;
}

@keyframes slide {
  0% {
    background-color:   #ff5702ff;
    transform: translatex(0vw);
  }
  100% {
    background-color:  #ffffffff;
    transform: translatex(
      calc(var(--container-size) - (var(--box-size) * 1.25))
    );
  }
}

@keyframes color-change {
  0% {
    background-color: #ff5702ff;
  }
  100% {
    background-color:#ffffffff;
  }
}

@keyframes flip-1 {
  0%,
  15% {
    transform: rotate(0);
  }
  35%,
  100% {
    transform: rotate(-180deg);
  }
}

@keyframes squidge-1 {
  5% {
    transform-origin: center bottom;
    transform: scalex(1) scaley(1);
  }
  15% {
    transform-origin: center bottom;
    transform: scalex(1.3) scaley(0.7);
  }
  25%,
  20% {
    transform-origin: center bottom;
    transform: scalex(0.8) scaley(1.4);
  }
  55%,
  100% {
    transform-origin: center top;
    transform: scalex(1) scaley(1);
  }
  40% {
    transform-origin: center top;
    transform: scalex(1.3) scaley(0.7);
  }
}

@keyframes flip-2 {
  0%,
  30% {
    transform: rotate(0);
  }
  50%,
  100% {
    transform: rotate(-180deg);
  }
}

@keyframes squidge-2 {
  20% {
    transform-origin: center bottom;
    transform: scalex(1) scaley(1);
  }
  30% {
    transform-origin: center bottom;
    transform: scalex(1.3) scaley(0.7);
  }
  40%,
  35% {
    transform-origin: center bottom;
    transform: scalex(0.8) scaley(1.4);
  }
  70%,
  100% {
    transform-origin: center top;
    transform: scalex(1) scaley(1);
  }
  55% {
    transform-origin: center top;
    transform: scalex(1.3) scaley(0.7);
  }
}

@keyframes flip-3 {
  0%,
  45% {
    transform: rotate(0);
  }
  65%,
  100% {
    transform: rotate(-180deg);
  }
}

@keyframes squidge-3 {
  35% {
    transform-origin: center bottom;
    transform: scalex(1) scaley(1);
  }
  45% {
    transform-origin: center bottom;
    transform: scalex(1.3) scaley(0.7);
  }
  55%,
  50% {
    transform-origin: center bottom;
    transform: scalex(0.8) scaley(1.4);
  }
  85%,
  100% {
    transform-origin: center top;
    transform: scalex(1) scaley(1);
  }
  70% {
    transform-origin: center top;
    transform: scalex(1.3) scaley(0.7);
  }
}

@keyframes flip-4 {
  0%,
  60% {
    transform: rotate(0);
  }
  80%,
  100% {
    transform: rotate(-180deg);
  }
}

@keyframes squidge-4 {
  50% {
    transform-origin: center bottom;
    transform: scalex(1) scaley(1);
  }
  60% {
    transform-origin: center bottom;
    transform: scalex(1.3) scaley(0.7);
  }
  70%,
  65% {
    transform-origin: center bottom;
    transform: scalex(0.8) scaley(1.4);
  }
  100%,
  100% {
    transform-origin: center top;
    transform: scalex(1) scaley(1);
  }
  85% {
    transform-origin: center top;
    transform: scalex(1.3) scaley(0.7);
  }
}

    </style>
</head>
<body>
    <div class="container" id="container">
        <!-- Success Card -->
        <div class="card success" id="cardsuccess">
            <div class="icon">
                ✓
            </div>
            <h1>Delete Successful</h1>
            <p>The item has been permanently deleted from the system. This action cannot be undone.</p>
            <div class="actions">
                <button class="btn btn-primary" onclick="window.open('recipi.php','_self')">
                    <span>Go to Dashboard</span>
                </button>
                
            </div>
            <div class="status-indicator">
                <div class="dot success-dot"></div>
                <span class="status-text">Operation completed successfully</span>
            </div>
        </div>

        <!-- Error Card -->
        <div class="card error" id="carderror">
            <div class="icon">
                ✕
            </div>
            <h1>Delete Failed</h1>
            <p>We encountered an error while trying to delete the item. Please try again or contact support if the problem persists.</p>
            <div class="actions">
                <button class="btn btn-primary" onclick="window.open('recipi.php','_self')">
                    <span>Try Again</span>
                </button>
                <button class="btn btn-secondary" onclick='window.open("https://t.me/testHubCommunity","_self")'>
                    <span><a href="https://t.me/testHubCommunity" style="text-decoration:none;color:white">Contact Support</a></span>
                </button>
            </div>
            <div class="status-indicator">
                <div class="dot error-dot"></div>
                <span class="status-text">Error code: 500 - Internal Server Error</span>
            </div>
        </div>
    </div>
    <div class="container1" id="loader">
		<div class="📦"></div>
		<div class="📦"></div>
		<div class="📦"></div>
		<div class="📦"></div>
		<div class="📦"></div>
	</div>
    <script>
      
        // Simple interaction for demonstration
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function() {
                const text = this.querySelector('span').textContent;
               
            });
        });


        const id = "<?php echo $id; ?>";
Loadingsteps(id);

function loadingAnimation() {
    return new Promise((resolve) => {
        setTimeout(() => {

            resolve(true); 
        }, 2000);
       
    });
}

const loader = document.getElementById('loader');


async function Loadingsteps(condition) {
    document.getElementById('cardsuccess').style.display = 'none';
        document.getElementById('carderror').style.display = 'none';
    await loadingAnimation();  // waits 2 seconds
    display(condition);        // pass the ID correctly
}

function display(id) {
    
    loader.style.display = 'none';
    if (id == 1) {
        document.getElementById('cardsuccess').style.display = 'block';
        document.getElementById('carderror').style.display = 'none';
        
    } else if (id == 0) {
        document.getElementById('carderror').style.display = 'block';
        document.getElementById('cardsuccess').style.display = 'none';
      
    }
}


    </script>
</body>
</html>