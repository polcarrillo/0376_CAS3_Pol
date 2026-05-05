<?php
/**
 * footer.php — Peu de pàgina simple de MONTSIÀ30
 * Ús: include 'footer.php';  (al final del body, després del contingut)
 */
?>
<style>
  footer {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 90;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.1);
  }
  .barrabaix {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
    background-color: #dce8f7;
    color: #1F85DE;
    padding: 15px 20px;
    border-top: 2px solid #1F85DE;
    font-family: 'Poppins', sans-serif;
    font-size: 0.95rem;
    font-weight: 500;
  }
  .barrabaix p { margin: 0; }
 
  @media (max-width: 480px) {
    .barrabaix {
      flex-direction: column;
      align-items: center;
      text-align: center;
      gap: 4px;
    }
    .barrabaix p { font-size: 0.85rem; }
  }
</style>
 
<footer>
  <div class="barrabaix">
    <p>Correu: atencioclient@montsià30.org</p>
    <p>Telèfon: 647 72 39 47</p>
  </div>
</footer>
 
</body>
</html>