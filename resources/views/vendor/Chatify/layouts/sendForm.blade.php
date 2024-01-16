<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-plus-circle"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" /></label>
        <button class="emoji-button"></span><span class="fas fa-smile"></button>
            @if (Auth::user()->type=='owner')
            <button onclick="openModal()" style="
            color: wheat;
            background-color: black;
            padding: 1%;
            border-radius: 10px;
            font-size: 10px;
        "
        >Send Agreement</button>
            @endif
        <textarea readonly='readonly' id="outputField" name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled' class="send-button"><span class="fas fa-paper-plane"></span></button>
    </form>
</div>

<style>
    /* Add your styles for the modal here */
    #myModal {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>
<!-- The Modal -->
<div id="myModal">
  <br>
    <input type="text" id="linkInput" placeholder="Enter Property Id">
    <br>
    <input type="text" id="emailInput" placeholder="Enter Email of Tenant">
    <br>
    <button onclick="generateLink()">Generate Link</button>
    <button onclick="closeModal()">Close</button>
  </div>
  
  <script>
    // Function to open the modal
    function openModal() {
      document.getElementById('myModal').style.display = 'block';
    }
  
    // Function to close the modal
    function closeModal() {
      document.getElementById('myModal').style.display = 'none';
    }
  
    // Function to generate the link
    function generateLink() {
      // Get the input value
      let linkText = document.getElementById('linkInput').value;
      let linkEmail = document.getElementById('emailInput').value;
  
      // Check if the input is not empty
      if (linkText.trim() !== '') {
  
        // Display the generated link in another field
        document.getElementById('outputField').value = 'http://127.0.0.1:8000/user/agreement/'+ linkText+ '/signAgreement';
        // Open the link in a new tab
        window.open('http://127.0.0.1:8000/user/agreement/'+ linkText+ '/makeAgreement/'+linkEmail, '_blank');
      }
  
      // Close the modal
      closeModal();
    }
  </script>
  
  