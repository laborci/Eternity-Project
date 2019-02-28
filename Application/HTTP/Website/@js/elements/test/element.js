import MyElement from "phlex-my-element";
import twig from "./template.twig";

@MyElement.register('my-test', twig)
class Element extends MyElement{
	createViewModel(){
		return {
			content: this.dataset.content
		}
	}
}