<?php

namespace IABundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Doctrine\ORM\EntityManagerInterface;

use IABundle\Entity\FormularioInicio;

use Doctrine\ORM\Query\ResultSetMapping;


use IABundle\Entity\Pruebas;
class DefaultController extends Controller
{
	public $minSup;

	public $minConf;

	public $ultimaPrueba;
    /**
     * @Route("/"),  name="index"
     */
   public function indexAction(Request $request)
		{
			 $em = $this->getDoctrine()->getManager();

			//obtengo la ultima prueba
			 $pruebas = $em
			   ->createQuery(
			        "SELECT p
			        FROM IABundle:Pruebas p
			          ORDER BY p.idprueba DESC")
			      
			    ;
			 $pruebas = $pruebas->getResult();
			
			
			

		    $formularioInicio = new FormularioInicio();

		    $form = $this->createFormBuilder($formularioInicio)
		        ->add('minSup', MoneyType::class)
		        ->add('minConf', MoneyType::class)
		        ->add('ejecutar', SubmitType::class, array('label' => 'Ejecutar '))
		        ->getForm();

		    $form->handleRequest($request);

		    if ($form->isSubmitted() && $form->isValid() ) {
		        // $form->getData() holds the submitted values
		        // but, the original `$task` variable has also been updated
		        $formularioInicio = $form->getData();

		        // ... perform some action, such as saving the task to the database
		        // for example, if Task is a Doctrine entity, save it!
		        // $em = $this->getDoctrine()->getManager();
		        // $em->persist($task);
		        // $em->flush();

		        //guardo los valores de soporte y confianzas minimos , asi como tambien el id de la ultima prueba
		       $this->minSup= $formularioInicio->getMinSup();
		       $this->minConf= $formularioInicio->getMinConf();
		       	if (sizeof($pruebas)>0) {
				  $this->ultimaPrueba= $pruebas[0]->getIdprueba()+1;
				}else{
					  $this->ultimaPrueba= 1;
				}
		      //ejecuto el algoritmo a priori
		       $this->algoritmoAprioriAction();
		       $Fk=$this->mostrarResultadosAction();
		       	return $this->render('IABundle::conjuntosFrecuentes.html.twig', array(
		        'form' => $form->createView(),
		        'pruebas'=>$pruebas,
		        'Fk'=>$Fk
		        ));
		        // $this->render('IABundle::conjuntosFrecuentes.html.twig');
		     
		    }else {
		    	 return $this->render('IABundle::index.html.twig', array(
		        'form' => $form->createView(),
		        'pruebas'=>$pruebas
		        ));
		    }

		   
		}




		public function  algoritmoAprioriAction(){

				//guardo en la tabla prueba
					$em = $this->getDoctrine()->getManager();

				    $prueba = new Pruebas();
				    $prueba->setSoporte($this->minSup);
				    // $prueba->setConfianza($this->minConf);

				    // tells Doctrine you want to (eventually) save the Product (no queries yet)
				    $em->persist($prueba);

				    // actually executes the queries (i.e. the INSERT query)
				    $em->flush();	

				$this->genConjuntosFrecuentesAction();
				// $this->generacionReglasAction();

				// $this->inicialiar();


		}

		public function genConjuntosFrecuentesAction(){
				//inicializo el doctrine
				$em = $this->getDoctrine()->getManager();

				//primer paso, genero F1
				 $this->inicializarAction();
				$k=1;

				//verifico la condicion de parada , si se cumple entro en el bucle
				$query = $em->createQuery('SELECT COUNT(s.idLinea) FROM IABundle:Subconjuntos s WHERE s.idPrueba = :ultimaPrueba AND s.idSubconjunto =:k ');
				$query->setParameter('ultimaPrueba', $this->ultimaPrueba);
				$query->setParameter(':k', $k);
				$tieneSuconjunto = $query->getResult()[0][1];
				dump($tieneSuconjunto);
				
				if ($tieneSuconjunto) {
					while ($tieneSuconjunto >1) {
						 $this->generarCandidatoUnionAction($k);
						 $this->generarCandidatoPodarAction($k);
						 $this->verificaCandidatoTransaccionAction($k);

						 //proximo fk a generar
						 $k=$k+1;
						 //seteo la condicion de fin
						 		$query = $em->createQuery('SELECT COUNT(s.idLinea) FROM IABundle:Subconjuntos s WHERE s.idPrueba = :ultimaPrueba AND s.idSubconjunto =:k ');
								$query->setParameter('ultimaPrueba', $this->ultimaPrueba);
								$query->setParameter(':k', $k);
								$tieneSuconjunto = $query->getResult()[0][1];

					}
				}
			


				// $this->generacionReglasAction();

				// $this->inicialiar();


		}

		 /**
     * @Route("/prueba"),  name="prueba"
     */
   public function inicializarAction()

		{
			dump('aca estoy');
		
			$stmt = $this->getDoctrine()->getEntityManager()
		   ->getConnection()
		    ->prepare('EXECUTE Paso1_inicializar :PRUEBA, :subconjunto, :MinSup');
		    $stmt->bindValue('PRUEBA',$this->ultimaPrueba);
		    $stmt->bindValue('subconjunto', 1);
		    $stmt->bindValue('MinSup', $this->minSup);
			$stmt->execute();	
			// $rsm = new ResultSetMapping;
			// $rsm->addEntityResult('IABundle:Pruebas', 'u');
			// $em = $this->getDoctrine()->getEntityManager();
			// $qb = $em->createNativeQuery(
			//         'EXECUTE Paso1_inicializar :PRUEBA, :subconjunto, :MinSup
			//         ',
			//         $rsm
			//     );
			// $qb->setParameters(
			//     array(
			//         'PRUEBA' => 6,
			//         'subconjunto' =>1,
			//         'MinSup' => 0.5,
			        
			//     ));
			// $qb->execute();
			 
		}

		 public function generarCandidatoUnionAction($k){
		 		$stmt = $this->getDoctrine()->getEntityManager()
		   ->getConnection()
		    ->prepare('EXECUTE Paso1_GenerarCandidatoUnion :Pruebba, :Subconjunto');
		    $stmt->bindValue('Pruebba',$this->ultimaPrueba);
		    $stmt->bindValue('Subconjunto', $k);
			$stmt->execute();

		 }

		  public function generarCandidatoPodarAction($k){
		  	$stmt = $this->getDoctrine()->getEntityManager()
		   ->getConnection()
		    ->prepare('EXECUTE Paso1_GenerarCandidatoPodar :Prueba, :Subconjunto');
		    $stmt->bindValue('Prueba',$this->ultimaPrueba);
		    $stmt->bindValue('Subconjunto', $k);
			$stmt->execute();
		 	
		 }

		 

		 public function verificaCandidatoTransaccionAction($k){

		 	$stmt = $this->getDoctrine()->getEntityManager()
		   ->getConnection()
		    ->prepare('EXECUTE Paso1_VerificaCandidatoTransaccion :prueba, :MinSop, :Subconjunto');
		    $stmt->bindValue('prueba',$this->ultimaPrueba);   
		    $stmt->bindValue('MinSop', $this->minSup);
		    $stmt->bindValue('Subconjunto', $k);
			$stmt->execute();
		 }


		 public function mostrarResultadosAction(){
		 	//obtengo todos los Fk de esta prueba
		 	$em = $this->getDoctrine()->getManager();
			$query = $em->createQuery('SELECT e.idElemento ,e.idSubconjunto,e.idLinea,el.descripcion FROM IABundle:Elementoxsubconjunto e INNER JOIN  IABundle:Elementos el WITH e.idElemento = el.idElemento WHERE e.idPrueba = :ultimaPrueba ');
			$query->setParameter('ultimaPrueba', $this->ultimaPrueba);
			$Fk = $query->getResult();
			return($Fk);					

		 }

}
